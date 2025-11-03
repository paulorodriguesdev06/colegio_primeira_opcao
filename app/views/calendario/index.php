<section class="h-full px-3 py-2 flex gap-2">
    <div class="min-w-60 py-3 px-4 flex flex-col bg-white rounded-2xl shadow">
        <h2 class="text-2xl text-center text-gray-800 mt-2">Nova Marcação</h2>
        <div class="flex flex-col gap-3 my-9">
            <label for="titulo" class="flex flex-col text-gray-800">
                Título
                <input type="" id="titulo" class="w-full px-3 py-2 bg-gray-100 rounded-lg focus:outline-none">
            </label>
            <label for="data_inicio" class="flex flex-col text-gray-800">
                Data de Início
                <input type="date" id="data_inicio" class="w-full px-3 py-2 bg-gray-100 rounded-lg focus:outline-none">
            </label>
            <label for="data_fim" class="flex flex-col text-gray-800">
                Data do Fim
                <input type="date" id="data_fim" class="w-full px-3 py-2 bg-gray-100 rounded-lg focus:outline-none">
            </label>
        </div>
        <p class="max-w-60 my-3 pl-1 text-sm text-gray-600 text-wrap">Caso o fim seja no mesmo dia, insira a mesma data.
        </p>
        <a href="" class="bg-gray-800 px-3 py-2 rounded-2xl text-gray-100 text-center transition hover:bg-gray-500">Adicionar</a>
    </div>
    <div id="calendario" class="h-full w-full p-3 rounded-2xl bg-white shadow"></div>
</section>







<!-- Script -->

<script src='<?= BASE_ASSETS ?>/js/index.global.min.js'></script>
<script src='<?= BASE_ASSETS ?>/js/core/locales/pt-br.global.min.js'></script>
<script src='<?= BASE_ASSETS ?>/js/calendario_scripts.js'></script>