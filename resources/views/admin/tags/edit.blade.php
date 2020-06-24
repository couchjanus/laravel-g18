<h1>Edit Category</h1>
<form method="POST" action="/admin/categories/{{ $category->id }}">
    <input type='hidden' name="_token" value="{{ csrf_token() }}">
    <input type='hidden' name="_method" value="PUT">
  <div class="form-group">
    <input name="id" type="hidden" value="{{ $category->id }}">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input id="description" type="text" class="form-control" name="description" value="{{ $category->description }}"> 
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
