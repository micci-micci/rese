<x-layout>
    <x-slot name="title">
        Restaurants page
    </x-slot>

    <main-detail>
        <div class="parent-container">

            <div class="child-container">
                <header>
                    <x-humberger>
                    </x-humberger>
                </header>
                <div class="back-container">
                    <span class="back-box">
                        <button type="button" onClick="history.back()" class="material-icons arrow-back-icon">chevron_left</button>
                    </span>
                    <h1 class="back-title">{{ $restaurant->name }}</h1>
                </div>
                <div class="detail-card">
                    <form method="get" action="">
                    @csrf

                        <div class="detail-card-header">
                            <figure class="detail-card-thumbnail">
                                <img src={{ $restaurant->image_url }}>
                            </figure>
                        </div>
                        <div class="detail-card-body">
                            <p class="detail-card-title"></p>
                            <div class="detail-card-tag-wrapper">
                                <p class="detail-card-tag-text">#{{ $restaurant->area->name }}</p>
                                <p class="detail-card-tag-text">#{{ $restaurant->category->name }}</p>
                            </div>
                            <p class="detail-card-txt">{{ $restaurant->description }}</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="child-container">
                <form method="post" action="{{ route('restaurants.reserve', ['restaurant_id'=>$restaurant->id]) }}" class="reserve-form">
                    @csrf

                    <div class="reserve-box">
                        <div class="reserve-container">
                            <h1 class="reserve-title">予約</h1>
                            @error('date')
                                <div class="reserve-error">{{ $message }}</div>
                            @enderror
                            <input type="date" class="reserve-input-space date-toggle" name="date"></input>
                            @error('time')
                                <div class="reserve-error">{{ $message }}</div>
                            @enderror
                            <input type="time" class="reserve-input-space reserve-input-width time-toggle" name="time"></input>
                            @error('number')
                                <div class="reserve-error">{{ $message }}</div>
                            @enderror
                            <input type="number" class="reserve-input-space reserve-input-width number-toggle" name="number" value="1" min="1"></input>
                            <div class="reserve-info">
                                <table class="reserve-info-table">
                                    <tr>
                                        <td>Shop</td>
                                        <td>{{ $restaurant->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td id="date"></td>
                                    </tr>
                                    <tr>
                                        <td>Time</td>
                                        <td id="time"></td>
                                    </tr>
                                    <tr>
                                        <td>Number</td>
                                        <td id="number"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="reserve-btn">
                            <input type="submit" class="reserve-btn-txt" value="予約する">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
