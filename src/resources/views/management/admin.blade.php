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
                    <form method="post" action="{{ route('admin.update', ['id'=>$user->id]) }}">
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
                            <button type="submit" class="update-btn button">UPDATE</button>
                        </td>
                        <td>
                            <button type="submit" class="delete-btn js-modal-open" data-id="{{ $user->id }}" data-target="delete-modal">DELETE</button>
                        </td>
                    </form>
                    {{-- Modal --}}
                    <div id="delete-modal" class="modal js-modal">
                        <div class="modal-bg js-modal-close"></div>
                        <div class="modal-content">
                            <form method="post" action="{{ route('admin.destroy') }}">
                                @csrf

                                <div class="modal-container">
                                    <p class="modal-txt">??????????????????????????????</p>
                                    <div class="modal-flex">
                                        <input class="modal-delete-val" type="hidden" name="id" value="">
                                        <button class="cancel-btn js-modal-close">CANCEL</button>
                                        <button type="submit" class="delete-btn" id="id">DELETE</button>
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
