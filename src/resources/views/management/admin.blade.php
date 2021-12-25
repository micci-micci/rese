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
                    {{-- Update --}}
                    <form method="post" action="{{ route('management.update', ['id'=>$user->id]) }}">
                        @csrf

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
                            <button type="submit" class="admin-update-btn button">UPDATE</button>
                        </td>
                        <td>
                            <button type="submit" class="admin-delete-btn js-modal-open">DELETE</button>
                        </td>
                    </form>
                    {{-- Delete --}}

                    {{-- Modal --}}
                    <div class="modal js-modal">
                        <div class="modal-bg js-modal-close"></div>
                        <div class="modal-content">
                            <form method="post" action="{{ route('management.destroy', ['id'=>$user->id]) }}">
                                @csrf

                                <div class="admin-modal-container">
                                    <p class="admin-modal-txt">本当に削除しますか？</p>
                                    <div class="admin-modal-flex">
                                        <button class="admin-cancel-btn js-modal-close">CANCEL</button>
                                        <button type="submit" class="admin-delete-btn">DELETE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
            </tbody>
            @endforeach
        </table>
    </main>
</x-layout>
