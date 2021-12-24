<x-layout>
    <x-slot name="title">
        Done page
    </x-slot>

    <header>
        <x-humberger>
        </x-humberger>
    </header>
    <main>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach ($users as $user)
            <tbody>
                <tr>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>
                        <label>
                            <select name="role" class="admin-role">
                                <option value="0" @if( $user->role =="0") selected @endif>User</option>
                                <option value="1" @if( $user->role =="1") selected @endif>Owner</option>
                                <option value="2" @if( $user->role =="2") selected @endif>Admin</option>
                            </select>
                        </label>
                    </td>
                    <td>
                        <span class="material-icons">
                            update
                        </span>
                    </td>
                    <td>
                        <form method="post" action="{{ route('management.destroy', ['id'=>$user->id]) }}">
                            @csrf

                            <button type="submit" class="admin-delete">
                                <i class="material-icons delete">delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </main>
</x-layout>
