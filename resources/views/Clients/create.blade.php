
<div class="container">
    <h2>Add New Client</h2>

    <form>
        <div class="form-group">
            <label for="name">Client Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter client name">
        </div>

        <div class="form-group">
            <label for="email">Client Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Enter client email">
        </div>

        <div class="form-group">
            <label for="phone">Client Phone:</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter client phone">
        </div>

        <button type="submit" class="btn btn-primary" disabled>Submit (Disabled)</button>
       <a href="{{ route('clientPage') }}" class="btn btn-secondary">Back to Clients Page</a>

    

    </form>
</div>

