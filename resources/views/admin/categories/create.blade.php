<h1>Add New Category</h1>
<form method="POST" action="/admin/categories">
  <input type='hidden' name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input id="description" type="text" class="form-control" name="description"> 
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
