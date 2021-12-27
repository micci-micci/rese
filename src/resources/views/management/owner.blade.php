<x-layout>
    <x-slot name="title">
        Done page
    </x-slot>

    <header>
        <x-humberger>
        </x-humberger>
    </header>
    <main>
        <div class="owner-container">
            <div class="owner-bar">
                <span class="owner-box-text">飲食店登録</span>
            </div>
            <form method="post" action="{{ route('owner.create') }}">
                @csrf

                <div class="owner-flex-box">
                    <input type="text" name="name" class="owner-text" placeholder="Restaurant name" value="{{ old('name') }}">
                    <select name="area_id" class="owner-select-box">
                        <option value="" hidden>All area</option>
                        <option value="13">東京都</option>
                        <option value="40">福岡県</option>
                        <option value="27">大阪府</option>
                    </select>
                    <select name="category_id" class="owner-select-box">
                        <option value="" hidden>All genre</option>
                        <option value="1">寿司</option>
                        <option value="2">焼肉</option>
                        <option value="3">居酒屋</option>
                        <option value="4">イタリアン</option>
                        <option value="5">ラーメン</option>
                    </select>
                </div>
                <div class="owner-input-box">
                    <textarea name="description" class="owner-textarea" placeholder="Description" value="{{ old('description') }}"></textarea>
                </div>
                <div class="owner-btn-flex">
                    <button type="submit" class="owner-upload-btn">画像アップロード</button>
                    <button type="submit" class="owner-create-btn">登録</button>
                </div>
            </form>
        </div>
        <div class="owner-space"></div>
        <button type="submit" class="owner-info-btn js-modal-open" data-target="modal03">予約確認</button>
        <div class="owner-space"></div>
        <div class="wrap">
            @foreach ($restaurants as $restaurant)
            <div class="card card-radius">
                <div class="card-header">
                    <figure class="card-thumbnail">
                        <img src="{{ $restaurant->image_url }}">
                    </figure>
                </div>
                <div class="owner-card-body">
                    <p class="card-title">{{ $restaurant->name }}</p>
                    <div class="card-tag-wrapper">
                        <p class="card-tag-text">#{{ $restaurant->area->name }}</p>
                        <p class="card-tag-text">#{{ $restaurant->category->name }}</p>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="owner-edit-btn js-modal-open" data-target="modal01">EDIT</button>
                        <button type="submit" class="owner-delete-btn js-modal-open"  data-id="{{ $restaurant->id }}" data-target="delete-modal">DELETE</button>
                    </div>
                </div>
                {{-- Edit modal --}}
                <div id="modal01" class="modal js-modal">
                    <div class="modal-bg js-modal-close"></div>
                    <div class="modal-content">
                        <div class="modal-container">
                            <p class="modal-txt">{{ $restaurant->name }}</p>
                            <div class="modal-flex">
                                <button class="cancel-btn js-modal-close">CANCEL</button>
                                <button type="submit" class="delete-btn">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Confirm modal --}}
                <div id="delete-modal" class="modal js-modal">
                    <div class="modal-bg js-modal-close"></div>
                    <div class="modal-content">
                        <form method="post" action="{{ route('owner.destroy', ['id'=>$restaurant->id]) }}">
                            @csrf

                            <div class="modal-container">
                                <p class="modal-txt">本当に削除しますか？</p>
                                <div class="modal-flex">
                                    <input class="modal-delete-val" type="hidden" name="id" value="">
                                    <button class="cancel-btn js-modal-close">CANCEL</button>
                                    <button type="submit" class="delete-btn">OK</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</x-layout>
