<h1 class="text-2xl font-normal mb-5">Visão Geral</h1>

<section class="w-full h-full flex flex-col">
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">

        <!-- Card Funcionários -->
        <div class=" bg-white border-l-5 border-l-purple-600 px-4 py-2 rounded shadow-md">
            <div class="flex flex-col gap-3 my-5 ">
                <h4 class="text-gray-800 text-xl">Funcionários</h4>
                <p class="text-gray-600">Total de Funcionários:
                    <span class="text-purple-600 font-semibold"><?= $quantidadeDeFuncionarios ?></span>
                </p>
            </div>
        </div>

        <!-- Card Alunos -->
        <div class=" bg-white border-l-5 border-l-blue-600 px-4 py-2 rounded shadow-md">
            <div class="flex flex-col gap-3 my-5 ">
                <h4 class="text-gray-800 text-xl">Alunos</h4>
                <p class="text-gray-600">Total de Alunos:
                    <span class="text-blue-600 font-semibold"><?= $quantidadeDeAlunos ?></span>
                </p>
            </div>
        </div>

        <!-- Card Pagamentos -->
        <div class=" bg-white border-l-5 border-l-green-600 px-4 py-2 rounded shadow-md">
            <div class="flex flex-col gap-3 my-5 ">
                <h4 class="text-gray-800 text-xl">Pagamentos</h4>
                <p class="text-gray-600">Total de Pagamentos:
                    <span class="text-green-600 font-semibold">13</span>
                </p>
            </div>
        </div>

        <!-- Card Reprovados -->
        <div class=" bg-white border-l-5 border-l-red-600 px-4 py-2 rounded shadow-md">
            <div class="flex flex-col gap-3 my-5 ">
                <h4 class="text-gray-800 text-xl">Reprovados</h4>
                <p class="text-gray-600">Total de Reprovados:
                    <span class="text-red-600 font-semibold"><?= $quantidadeDeAlunosReprovados ?></span>
                </p>
            </div>
        </div>

    </div>

    <div class="h-full w-full pb-5 mt-4 grid grid-cols-1 lg:grid-cols-2 gap-4">

        <div class="max-h-91 h-full grid grid-cols-2 gap-4">
            <div class="px-4 py-2 rounded shadow-md border border-gray-100 bg-white">
                <div class="w-full flex justify-between items-center px-1">
                    <h3 class="text-gray-800 text-xl mt-3 mb-4">Clima de Hoje</h3>
                    <i class="fa-regular fa-cloud text-xl text-gray-800"></i>
                </div>
            </div>
            <div class="px-4 py-2 rounded shadow-md border border-gray-100 bg-white">
                <div class="w-full flex justify-between items-center px-1">
                    <h3 class="text-gray-800 text-xl mt-3 mb-4">Agenda de Hoje</h3>
                    <i class="fa-regular fa-calendar text-xl text-gray-800"></i>
                </div>
            </div>
        </div>

        <div class="w-full h-full max-h-91 rounded shadow-md border border-gray-100 bg-white p-3">
            <h3 class="text-gray-800 text-xl text-center mt-2 mb-4">Últimos Pagamentos na Semana</h3>

            <div class="h-52 overflow-y-auto">
                <table id="tableNovosAlunos" class="min-w-full text-sm text-left text-gray-700 z-10">
                    <thead class="text-xs uppercase bg-gray-100">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Turma</th>
                            <th>Forma de Pagamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($todosAlunos as $aluno) : ?>
                            <tr class="hover:bg-gray-100">
                                <td><?= $aluno->getId() ?></td>
                                <td><?= $aluno->getNome() ?></td>
                                <td><?= $aluno->getTurma() ?></td>
                                <td class="text-center">Pix</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</section>

<script>
    $(document).ready(function() {
        $('#tableNovosAlunos').DataTable({
            dom: 't',
            responsive: true,
        });

    })
</script>