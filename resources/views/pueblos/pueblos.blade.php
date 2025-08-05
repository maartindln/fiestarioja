<div class="w-full px-2 text-green-950 group hover:bg-yellow-500/20 rounded flex justify-between items-center cursor-pointer pb-4 border-b border-gray-300">
    <img class="sm:w-[8rem] md:block hidden group-hover:animate-pulse" src="{{ $pueblo->image ?? asset('images/placeholder.png') }}" alt="{{ $pueblo->name }}">
    <h2 class="sm:text-4xl text-xl">{{ $pueblo->name }}</h2>
    <h3 class="sm:text-2xl text-xl">{{ $pueblo->date }}</h3>
    <div class="flex items-center gap-1">
        <i class="fa-solid fa-plus text-xl text-green-950 sm:block hidden"></i>
        <a href="#" class="font-semibold sm:text-xl sm:block hidden">Ver más</a>
        <i class="fa-solid fa-eye text-3xl text-green-950 sm:hidden block"></i>
    </div>
 </div>
