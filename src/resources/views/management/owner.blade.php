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
            <form method="post" action="{{ route('owner.create') }}" enctype="multipart/form-data">
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
                    <label for="file" class="owner-upload-btn">店舗画像アップロード</label>
                    <input type="file" id="file" name="image_url" class="owner-none-btn">
                    <button type="submit" class="owner-create-btn">登録</button>
                </div>
            </form>
        </div>
        <div class="owner-space"></div>
        <div class="owner-reserve-container">
            <a href="{{ route('owner.reservation') }}" class="owner-reserve-btn">予約確認</a>
        </div>
        <div class="owner-space"></div>
        <div class="wrap">
            @isset ($restaurants)
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
                        <button type="submit" class="owner-edit-btn js-edit-modal-open" data-id="{{ $restaurant->id }}" data-target="edit-modal">EDIT</button>
                        <button type="submit" class="owner-delete-btn js-modal-open"  data-id="{{ $restaurant->id }}" data-target="delete-modal">DELETE</button>
                    </div>
                </div>
                {{-- Edit modal --}}
                <div id="edit-modal" class="modal js-edit-modal">
                    <div class="modal-bg js-edit-modal-close"></div>
                    <div class="modal-content">
                        <form method="post" action="{{ route('owner.update') }}" enctype="multipart/form-data">
                            @csrf

                            <figure class="owner-modal-thumbnail">
                                <img src="" id="restaurant_image_url">
                            </figure>
                            <div class="owner-modal-box">
                            <input id="restaurant_name" type="text" name="name" class="owner-modal-text" placeholder="" value="">
                                <div class="owner-modal-container">
                                    <select name="area_id" class="owner-modal-select-box" id="restaurant_area">
                                        <option value="" hidden>All area</option>
                                        <option value="13">東京都</option>
                                        <option value="40">福岡県</option>
                                        <option value="27">大阪府</option>
                                    </select>
                                    <select name="category_id" class="owner-modal-select-box" id="restaurant_category">
                                        <option value="" hidden>All genre</option>
                                        <option value="1">寿司</option>
                                        <option value="2">焼肉</option>
                                        <option value="3">居酒屋</option>
                                        <option value="4">イタリアン</option>
                                        <option value="5">ラーメン</option>
                                    </select>
                                </div>
                                <div class="owner-modal-input-box">
                                    <textarea id="restaurant_description" name="description" class="owner-modal-textarea" placeholder="Description" value=""></textarea>
                                </div>
                                <div class="owner-mmodal-container-btn">
                                    {{-- <label for="file" class="owner-modal-upload-btn">添付</label>
                                    <input type="file" id="file" name="image_url" class="owner-none-btn"> --}}
                                    <input type="file" name="image_url" id="restaurant_image_url" value="">
                                    <input id="restaurant_id" class="js-modal-update-val" type="hidden" name="id" value="">
                                    <button type="submit" class="owner-modal-update-btn">更新</button>
                                </div>
                            </div>
                        </form>
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
            @endisset
        </div>
    </main>
</x-layout>
