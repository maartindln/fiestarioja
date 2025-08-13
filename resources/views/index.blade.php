@extends('layout')
@section('titulo', 'Inicio')
@section('content')
<!-- Hero section -->
<div class="relative bg-amber-50 pt-10">
    <div class="absolute inset-x-0 bottom-0">
        <svg viewBox="0 0 224 12" preserveAspectRatio="none" class="w-full -mb-1 text-green-950">
            <path
            d="M0,0 C48.8902582,6.27314026 86.2235915,9.40971039 112,9.40971039 C137.776408,9.40971039 175.109742,6.27314026 224,0 L224,12.0441132 L0,12.0441132 L0,0 Z"
            fill="currentColor" />
        </svg>
    </div>
  <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="relative max-w-2xl sm:mx-auto sm:max-w-xl md:max-w-2xl text-center">
      <h1 class="mb-6 font-sans font-bold drop-shadow-[0_0_1px_black] tracking-tight text-amber-50 sm:text-4xl sm:leading-none">
        <span class="text-red-600 text-5xl sm:text-6xl md:text-7xl lg:text-8xl">F</span>
        <span class="text-white text-5xl sm:text-6xl md:text-7xl lg:text-8xl">I</span>
        <span class="text-lime-500 text-5xl sm:text-6xl md:text-7xl lg:text-8xl">E</span>
        <span class="text-yellow-400 text-5xl sm:text-6xl md:text-7xl lg:text-8xl">S</span>
        <span class="text-red-600 text-5xl sm:text-6xl md:text-7xl lg:text-8xl">T</span>
        <span class="text-white text-5xl sm:text-6xl md:text-7xl lg:text-8xl">A</span>
        <span class="text-lime-500 text-5xl sm:text-6xl md:text-7xl lg:text-8xl">R</span>
        <span class="text-yellow-400 text-5xl sm:text-6xl md:text-7xl lg:text-8xl">I</span>
        <span class="text-red-600 text-5xl sm:text-6xl md:text-7xl lg:text-8xl">O</span>
        <span class="text-white text-5xl sm:text-6xl md:text-7xl lg:text-8xl">J</span>
        <span class="text-lime-500 text-5xl sm:text-6xl md:text-7xl lg:text-8xl">A</span>

    </h1>
        <br class="hidden md:block" />
        <h2 class="mb-6 font-sans text-2xl font-bold tracking-tight text-green-950 sm:text-4xl sm:leading-none">
            <span class="relative inline-block">
            ¡No te pierdas ninguna fiesta!
            <div class="w-full h-3 -mt-3 bg-yellow-400"></div>
            </span>
        </h2>
      <p class="mb-6 text-base font-thin tracking-wide text-green-950 md:text-lg">
        🎊 ¿Quieres saber cuándo y dónde se celebran las fiestas en La Rioja? 🥳 Estás en el lugar correcto.
        En esta página encontrarás un 📅 calendario completo y actualizado con todas las fiestas oficiales de la comunidad:
        desde las grandes celebraciones regionales 🏞️ hasta las fiestas locales de pueblos 🏘️, barrios 🎈 y establecimientos 🏠.<br><br>

        Nos encargamos de reunir en un solo sitio toda la información 🧭 para que puedas organizarte 📌,
        descubrir nuevas fiestas 🎆 y no perderte ninguna cita importante ❗.
        Ya sea una romería popular 🚶‍♂️, una feria 🎡, una verbena de barrio 💃 o un evento cultural 🎭 en algún rincón especial de La Rioja, aquí lo tendrás todo a mano. 🎉<br><br>

        Explora 🗺️, comparte 🤝 y vive La Rioja… 🍇🍷
      </p>

      <a
        href="#contacto"
        aria-label="Scroll down"
        class="flex items-center justify-center w-10 h-10 mx-auto mt-40 sm:mt-48 lg:mt-56 xl:mt-64 text-green-950 duration-300 transform border border-gray-400 rounded-full hover:text-teal-accent-400 hover:border-teal-accent-400 hover:shadow hover:scale-110"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
          <path d="M10.293,3.293,6,7.586,1.707,3.293A1,1,0,0,0,.293,4.707l5,5a1,1,0,0,0,1.414,0l5-5a1,1,0,1,0-1.414-1.414Z"></path>
        </svg>
      </a>
    </div>
  </div>
</div>
<!-- Introduccion -->
<div class="overflow-hidden bg-green-950 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
      <div class="lg:pt-4 lg:pr-8">
        <div class="lg:max-w-lg">
          <h2 class="text-base/7 font-semibold text-green-600">Pequeño resumen</h2>
          <p class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-yellow-400 sm:text-5xl">¿Qué ofrecemos?</p>
          <p class="mt-6 text-lg/8 text-amber-50">
            ¿Quieres saber cuándo y dónde se celebran las fiestas en La Rioja? Estás en el lugar correcto.
          </p>
          <dl class="mt-10 max-w-xl space-y-8 text-base/7 text-amber-50 lg:max-w-none">
            <div class="relative pl-9">
              <dt class="inline font-semibold text-yellow-400">
                <i class="fa-solid fa-calendar-days absolute top-2 left-1 size-5 text-yellow-400"></i>
                Calendario.
              </dt>
              <dd class="inline">
                Herramienta de busqueda de festivos mediante un calendario actualizado.
              </dd>
            </div>
            <div class="relative pl-9">
              <dt class="inline font-semibold text-yellow-400">
                <i class="fa-solid fa-list absolute top-2 left-1 size-5 text-yellow-400"></i>
                Listado.
              </dt>
              <dd class="inline">Posibilidad de buscar en forma fe lista la festividad que desees de forma ordenada.</dd>
            </div>
            <div class="relative pl-9">
              <dt class="inline font-semibold text-yellow-400">
                <i class="fa-solid fa-magnifying-glass absolute top-2 left-1 size-5 text-yellow-400"></i>
                Buscador.
              </dt>
              <dd class="inline">Recurso de busqueda de festividades mediante el uso del buscador incluyendo el nombre de la fiesta o el lugar.</dd>
            </div>
          </dl>
        </div>
      </div>
      <img src="images/larioja_municipios_amarillo.png" alt="Product screenshot" class="md:w-[730px] w-full max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-228 md:-ml-4 lg:-ml-0" />
    </div>
  </div>
</div>
<!-- Inicio de sesion y registro -->
<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
    <div>
      <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-green-600 uppercase rounded-full bg-teal-accent-400">
        Brand new
      </p>
    </div>
    <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-yellow-400 sm:text-4xl md:mx-auto">
      <span class="relative inline-block">
        <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
          <defs>
            <pattern id="d9d7687a-355f-4502-8ec4-7945db034688" x="0" y="0" width=".135" height=".30">
              <circle cx="1" cy="1" r=".7"></circle>
            </pattern>
          </defs>
          <rect fill="url(#d9d7687a-355f-4502-8ec4-7945db034688)" width="52" height="24"></rect>
        </svg>
        <span class="relative">Ventajas</span>
      </span>
      de iniciar sesión con tu cuenta
    </h2>
    <p class="text-base text-amber-50 md:text-lg">
      Crea tu cuenta sin necesidad de desvelar tus datos personales
    </p>
  </div>
  <div class="grid gap-5 mb-8 md:grid-cols-2 lg:grid-cols-3">

    <div class="transition-transform duration-300 hover:-translate-y-2">
        <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="100" class="p-5 bg-white border rounded shadow-sm">
            <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
            <i class="fa-solid fa-star text-yellow-400"></i>
            </div>
            <h6 class="mb-2 font-semibold leading-5">Favoritos</h6>
            <p class="text-sm text-gray-900">
            Posibilidad de guardar tus festividades en favoritos para siempre tenerlas a mano. En listado por ejmplo puedes activar la vision de solo favoritos.
            </p>
        </div>
    </div>


    <div class="transition-transform duration-300 hover:-translate-y-2">
        <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="200" class="p-5 bg-white border rounded shadow-sm">
            <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
            <svg class="w-10 h-10 text-yellow-400" stroke="currentColor" viewBox="0 0 52 52">
                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"
                points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
            </svg>
            </div>
            <h6 class="mb-2 font-semibold leading-5">The doctor said</h6>
            <p class="text-sm text-gray-900">
            Baseball ipsum dolor sit amet cellar rubber win hack tossed. Slugging catcher slide bench league, left fielder nubber.
            </p>
        </div>
    </div>

    <div class="transition-transform duration-300 hover:-translate-y-2">
        <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="300" class="p-5 bg-white border rounded shadow-sm">
            <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
            <svg class="w-10 h-10 text-yellow-400" stroke="currentColor" viewBox="0 0 52 52">
                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"
                points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
            </svg>
            </div>
            <h6 class="mb-2 font-semibold leading-5">The doctor said</h6>
            <p class="text-sm text-gray-900">
            Baseball ipsum dolor sit amet cellar rubber win hack tossed. Slugging catcher slide bench league, left fielder nubber.
            </p>
        </div>
    </div>

  </div>
  <div class="text-center">
    <a href="{{route('register')}}" class="inline-flex items-center justify-center w-full h-12 px-6 font-bold tracking-wide text-green-950 rounded shadow-md md:w-auto bg-yellow-400 hover:bg-yellow-500">
      REGISTRATE
    </a>
  </div>
</div>
<!-- Contacto -->
<div id="contacto" class="mb-10"></div>
<section class="bg-amber-50">
    <div class="relative bg-green-950 pb-20 overflow-hidden">
        <div class="relative z-10 container mx-auto px-4">
            <div class="flex flex-col lg:flex-row justify-between gap-8 py-16">
                <div class="lg:w-1/2 text-white">
                    <h2 class="text-2xl md:text-4xl font-bold mb-3">¿Échas en falta algo?</h2>
                    <p class="text-lg leading-relaxed">
                        Si conoces algun festivo que tendrá lugar en la comunidad y no está publicado háznoslo saber.
                    </p>
                </div>

                <div data-aos="fade-left" data-aos-duration="600" class="lg:w-2/5">
                    <div class="bg-white rounded-xl shadow-lg -mb-24 p-6 md:p-10">
                        <div class="bg-white rounded-xl p-6 md:p-8">
                            <h2 class="text-2xl md:text-4xl font-bold text-gray-900 mb-3">Contáctanos</h2>
                            <p class="text-base text-gray-600 mb-6">
                                Utiliza el siguiente cuestionario para informarnos de nuevas festividades.
                            </p>
                            <form action="{{ route('contacto.enviar') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <input type="email" name="email" placeholder="Correo" class="w-full bg-blue-100/20 text-gray-800 rounded-lg border border-transparent focus:border-blue-300 focus:outline-none px-4 py-3">
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="nombre" placeholder="Nombre del festivo" required class="w-full bg-blue-100/20 text-gray-800 rounded-lg border border-transparent focus:border-blue-300 focus:outline-none px-4 py-3">
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="municipio" placeholder="Municipio del festivo" required class="w-full bg-blue-100/20 text-gray-800 rounded-lg border border-transparent focus:border-blue-300 focus:outline-none px-4 py-3">
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="fecha" placeholder="Fechas en las que se celebra. (DD/MM/AAAA)" required class="w-full bg-blue-100/20 text-gray-800 rounded-lg border border-transparent focus:border-blue-300 focus:outline-none px-4 py-3">
                                </div>
                                <div class="mb-4">
                                    <textarea name="descripcion" placeholder="Breve descripción" class="w-full bg-blue-100/20 text-gray-800 rounded-lg border border-transparent focus:border-blue-300 focus:outline-none px-4 py-3" rows="3"></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-green-950 font-bold px-6 py-3 rounded-lg transition">
                                        <i class="fa-solid fa-paper-plane mr-4 text-green-950"></i>ENVIAR
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg class="absolute bottom-0 left-0 w-full h-96 z-0" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="#FFFBEC" points="0,0 100,70 100,100 0,100"/>
        </svg>
    </div>
    <div class="h-24"></div>
</section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const link = document.querySelector('a[href="#contacto"]');
        const target = document.querySelector('#contacto');

        if (link && target) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            });
        }
    });
</script>
