<div class="container">
    <h2>Add New Client</h2>

    <h2>Add New Client</h2>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" required>

        <button type="submit" class="btn btn-primary" disabled>Submit (Disabled)</button>
        <a href="{{ route('clientPage') }}" class="btn btn-secondary">Back to Clients Page</a>



    </form>
</div>
<label>Email:</label>
<input type="email" name="email">

<label>Phone:</label>
<input type="text" name="phone">

<button type="submit">Save</button>

<a href="{{ route('clientPage') }}">
    <button type="button">← Back to Clients</button>
</a>

</form>

</div>