@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator|\App\Domain\Product\Product[] $products */
@endphp

<x-app-layout title="Products">
    <div class="grid grid-cols-12 gap-12">
        <form action="{{ route('search') }}" class="w-full max-w-lg" method="GET">
            <div class="w-full p-1">
                <label class="inline-block text-sm text-gray-600">По категории ТНВЭД</label>
                <div class="relative flex w-full">
                    <select class="block w-full rounded-sm cursor-pointer focus:outline-none" id="category"
                            name="category" >
                        <option value="0">Выберите категорию</option>
                        <option value="1">Электроника</option>
                        <option value="2">Продукты питания</option>
                        <option value="3">ПРОДУКТЫ РАСТИТЕЛЬНОГО ПРОИСХОЖДЕНИЯ</option>
                        <option value="4">Севастополь - 4</option>
                        <option value="5">Симферополь - 5</option>
                        <option value="6">Абакан - 6</option>
                        <option value="7">Адлер - 7</option>
                        <option value="8">Анапа - 8</option>
                        <option value="9">Ангарск - 9</option>
                        <option value="10">Архангельск - 10</option>
                        <option value="11">Астрахань - 11</option>
                        <option value="12">Барнаул - 12</option>
                        <option value="13">Белгород - 13</option>
                        <option value="14">Благовещенск - 14</option>
                        <option value="15">Чебоксары - 15</option>
                        <option value="16">Челябинск - 16</option>
                        <option value="17">Череповец - 17</option>
                        <option value="18">Черняховск - 18</option>
                        <option value="19">Чита - 19</option>
                        <option value="20">Екатеринбург - 20</option>
                        <option value="21">Геленджик - 21</option>
                        <option value="22">Иркутск - 22</option>
                        <option value="23">Ижевск - 23</option>
                        <option value="24">Кабардинка - 24</option>
                        <option value="25">Калининград - 25</option>
                        <option value="26">Казань - 26</option>
                        <option value="27">Кемерово - 27</option>
                        <option value="28">Хабаровск - 28</option>
                        <option value="29">Ханты-Мансийск - 29</option>
                        <option value="30">Кисловодск - 30</option>
                    </select>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 p-1">
                <label class="inline-block text-sm text-gray-600" for="Multiselect">По кодам города</label>
                <div class="relative flex w-full">
                    <select
                        id="select-city"
                        name="cities[]"
                        multiple
                        placeholder="Выберите город..."
                        autocomplete="off"
                        class="block w-full rounded-sm cursor-pointer focus:outline-none"
                        multiple
                    >
                        <option value="1">Алушта - 1</option>
                        <option value="2">Феодосия - 2</option>
                        <option value="3">Ялта - 3</option>
                        <option value="4">Севастополь - 4</option>
                        <option value="5">Симферополь - 5</option>
                        <option value="6">Абакан - 6</option>
                        <option value="7">Адлер - 7</option>
                        <option value="8">Анапа - 8</option>
                        <option value="9">Ангарск - 9</option>
                        <option value="10">Архангельск - 10</option>
                        <option value="11">Астрахань - 11</option>
                        <option value="12">Барнаул - 12</option>
                        <option value="13">Белгород - 13</option>
                        <option value="14">Благовещенск - 14</option>
                        <option value="15">Чебоксары - 15</option>
                        <option value="16">Челябинск - 16</option>
                        <option value="17">Череповец - 17</option>
                        <option value="18">Черняховск - 18</option>
                        <option value="19">Чита - 19</option>
                        <option value="20">Екатеринбург - 20</option>
                        <option value="21">Геленджик - 21</option>
                        <option value="22">Иркутск - 22</option>
                        <option value="23">Ижевск - 23</option>
                        <option value="24">Кабардинка - 24</option>
                        <option value="25">Калининград - 25</option>
                        <option value="26">Казань - 26</option>
                        <option value="27">Кемерово - 27</option>
                        <option value="28">Хабаровск - 28</option>
                        <option value="29">Ханты-Мансийск - 29</option>
                        <option value="30">Кисловодск - 30</option>
                    </select>
                </div>
            </div>
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Поиск
            </button>
            <a href="{{ route('search') }}"
               class="btn btn-light">Сбросить</a>
        </form>
    </div>


    <div class="grid grid-cols-3 gap-12">
        @foreach($products as $product)
            <x-product
                :title="$product->name"
                :price="format_money($product->getItemPrice()->pricePerItemIncludingVat())"
                :actionUrl="action(\App\Http\Controllers\Cart\AddCartItemController::class, [$product])"
            />
        @endforeach
    </div>

    <div class="mx-auto mt-12">
        {{ $products->links() }}
    </div>
</x-app-layout>
