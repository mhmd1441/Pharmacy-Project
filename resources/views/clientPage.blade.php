<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Client Management</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://kit.fontawesome.com/yourkit.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Pharmacies Zone</h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="{{ route('adminDashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ route('clients.index') }}" class="active"><i class="fas fa-users"></i> <span>Clients</span></a></li>
                <li><a href="#"><i class="fas fa-user-tie"></i> <span>Employees</span></a></li>
                <li><a href="{{ route('adminOrder') }}"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
                <li><a href="#"><i class="fas fa-truck"></i> <span>Shipping</span></a></li>
                <li><a href="#"><i class="fas fa-box"></i> <span>Order Shipping</span></a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="header">
            <h1>Client Management</h1>

            <!-- Search Form -->
            <form method="GET" action="{{ route('clients.index') }}" class="search-bar">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>

            <!-- Add New Client -->
            <a href="{{ route('clients.create') }}" class="btn btn-success">Add new client</a>

        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                    <tr>
                        <td>#{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td class="{{ $client->status === 'Active' ? 'status-active' : 'status-inactive' }}">
                            {{ $client->status }}
                        </td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-edit">
                                    <i class="fas fa-edit"></i> <span>Edit</span>
                                </a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this client?')">
                                        <i class="fas fa-trash-alt"></i> <span>Delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No clients found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                {{ $clients->withQueryString()->links() }}
            </div>
        </div>
    </div>
</body>

</html>
