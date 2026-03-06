<x-app-layout>
    <div class="">
        <div class="max-w-7xl mx-auto md:px-2 lg:px-0 space-y-6">

            <!-- Welcome Section -->
            <div class="bg-base-100 p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold">Welcome admin, {{ Auth::user()->name }}!</h1>
                <p class="mt-1 text-base-content/70">Today is {{ now()->format('l, F j, Y') }}</p>
                <span class="skeleton skeleton-text">AI is thinking harder...</span>
            </div>

            <!-- user card -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-base-100 p-6 rounded-lg shadow-md">
                <div class="flex w-52 flex-col gap-4">
                    <div class="flex items-center gap-4">
                        <div class="skeleton h-16 w-16 shrink-0 rounded-full"></div>
                        <div class="flex flex-col gap-4">
                        <div class="skeleton h-4 w-20"></div>
                        <div class="skeleton h-4 w-28"></div>
                        </div>
                    </div>
                    <div class="skeleton h-32 w-full"></div>
                </div>
                <div class="flex w-52 flex-col gap-4">
                    <div class="flex items-center gap-4">
                        <div class="skeleton h-16 w-16 shrink-0 rounded-full"></div>
                        <div class="flex flex-col gap-4">
                        <div class="skeleton h-4 w-20"></div>
                        <div class="skeleton h-4 w-28"></div>
                        </div>
                    </div>
                    <div class="skeleton h-32 w-full"></div>
                </div>
                <div class="flex w-52 flex-col gap-4">
                    <div class="flex items-center gap-4">
                        <div class="skeleton h-16 w-16 shrink-0 rounded-full"></div>
                        <div class="flex flex-col gap-4">
                        <div class="skeleton h-4 w-20"></div>
                        <div class="skeleton h-4 w-28"></div>
                        </div>
                    </div>
                    <div class="skeleton h-32 w-full"></div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="card bg-base-200 shadow-md rounded-lg p-5">
                    <div class="card-body">
                        <h2 class="card-title text-base-content">Users</h2>
                        <p class="text-3xl font-bold text-primary">1,245</p>
                        <p class="text-sm text-base-content/60">Total registered users</p>
                    </div>
                </div>

                <div class="card bg-base-200 shadow-md rounded-lg p-5">
                    <div class="card-body">
                        <h2 class="card-title text-base-content">Orders</h2>
                        <p class="text-3xl font-bold text-secondary">532</p>
                        <p class="text-sm text-base-content/60">Orders processed today</p>
                    </div>
                </div>

                <div class="card bg-base-200 shadow-md rounded-lg p-5">
                    <div class="card-body">
                        <h2 class="card-title text-base-content">Revenue</h2>
                        <p class="text-3xl font-bold text-accent">$12,430</p>
                        <p class="text-sm text-base-content/60">Today's revenue</p>
                    </div>
                </div>

                <div class="card bg-base-200 shadow-md rounded-lg p-5">
                    <div class="card-body">
                        <h2 class="card-title text-base-content">Tickets</h2>
                        <p class="text-3xl font-bold text-warning">23</p>
                        <p class="text-sm text-base-content/60">Pending support tickets</p>
                    </div>
                </div>
            </div>

            <!-- Alerts -->
            <div class="alert alert-info shadow-lg rounded-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1 4h.01M12 8h.01M12 8a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>
                    <span>System maintenance scheduled for tomorrow at 02:00 AM.</span>
                </div>
            </div>

            <!-- Table Example -->
            <div class="overflow-x-auto bg-base-100 shadow-md rounded-lg">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jane Doe</td>
                            <td>jane@example.com</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <td>John Smith</td>
                            <td>john@example.com</td>
                            <td><span class="badge badge-warning">Pending</span></td>
                            <td>Editor</td>
                        </tr>
                        <tr>
                            <td>Mary Johnson</td>
                            <td>mary@example.com</td>
                            <td><span class="badge badge-error">Inactive</span></td>
                            <td>Author</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Quick Action Buttons -->
            <div class="flex flex-wrap gap-4">
                <button class="btn btn-primary">Add User</button>
                <button class="btn btn-secondary">View Reports</button>
                <button class="btn btn-accent">Generate Invoice</button>
                <button class="btn btn-warning">Send Notifications</button>
            </div>

        </div>
    </div>
</x-app-layout>