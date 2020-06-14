<h1>Categories</h1>
<a href="/admin/categories/create"><button>Add New Category</button></a>
<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($categories as $category):?>
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->created_at }}</td>
        <td><a href="/admin/categories/{{ $category->id }}/edit"><button>Edit</button></a>
        <form method='POST' action="/admin/categories/{{ $category->id }}" style="display:inline;">
            <input type='hidden' name="_token" value="{{ csrf_token() }}">
            <input type='hidden' name="_method" value="DELETE">
            <button type='submit'>Delete</button>
        </form>
        </td>
    </tr>
<?php endforeach?>
</table>
