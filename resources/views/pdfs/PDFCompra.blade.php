<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        table, td, th {
            border: 1px solid;
        }
        table {
            border-collapse: collapse;
        }
        .negritaTitulo {
            font-weight: bolder;
        }
        .negrita {
            font-weight: bold;
        }
        .contenedor {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .col1, .col2 {
            width: 50%
        }
        .suelo {
            margin-top: 80px;
            bottom: 0;
        }
        .mayus {
            text-transform: uppercase;
        }
    </style>

</head>

<body>
    @foreach ($reserva as $r)
        <section class="py-20 bg-black">
            <div class="max-w-5xl mx-auto py-16 bg-white">
                <article class="overflow-hidden">
                    <div class="bg-[white] rounded-b-md">
                        <div class="p-9">
                            <div class="space-y-6 text-slate-700">
                                <img class="object-cover h-12"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc2SrikgGzgJfxdgcvvoDoJPqvbO7KXqGcWQ&usqp=CAU" width="200px"/>
                                    <br>
                                <p class="text-xl tracking-tight uppercase negritaTitulo">
                                    HOTEL PRÍNCIPE PÍO MADRID
                                </p>
                            </div>
                        </div>
                        <div class="p-9">
                            <div class="flex w-full">
                                <div class="contenedor">
                                    <div class="col1 font-light text-slate-500">
                                        <p class="text-xl negrita text-slate-700">
                                            Detalles Factura:
                                        </p>
                                        <p>Hotel Príncipe Pío</p>
                                        <p>Cta. de San Vicente, 14</p>
                                        <p>28008, Madrid</p>
                                    </div>
                                    <br>
                                    <div class="col2 font-light text-slate-500">
                                        <p class="negrita text-slate-700">Facturado A</p>
                                        <p>{{ $r->user_name }} {{ $r->user_apellido }}</p>
                                        <p>{{ $r->dni }}</p>
                                        <p>{{ $r->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
<br>
                        <div class="p-9">
                            <div class="flex flex-col mx-0 mt-8">
                                <table class="min-w-full divide-y divide-slate-500 table-auto w-100">
                                    <thead>
                                        <tr>
                                            <th scope="row" colspan="3"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0">
                                                Descripción
                                            </th>
                                            <th
                                                class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                                Noches
                                            </th>
                                            <th
                                                class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                                Precio
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b border-slate-200">
                                            <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0" scope="row" colspan="3">
                                                <div class="font-medium text-slate-700 mayus">{{ $r->nombre }}</div>
                                            </td>
                                            <td
                                                class="hidden px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                                            <?php
                                            $f1 = new DateTime($r->fecha_entrada);
                                            $f2 = new DateTime($r->fecha_salida);
                                            $diff = $f1->diff($f2);
                                             echo $diff->days;
                                             ?>
                                            </td>
                                            <td
                                                class="py-4 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                                {{ $r->precio }}
                                            </td>
                                        </tr>

                                        <!-- Here you can write more products/tasks that you want to charge for-->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="row" colspan="3"
                                                class="hidden pt-6 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
                                            </th>
                                            <th scope="row"
                                                class="pt-6 pl-4 pr-3 text-sm font-light text-left text-slate-500 sm:hidden">
                                                Subtotal
                                            </th>
                                            <td
                                                class="pt-6 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                                {{ $r->precio_total }} €
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="3"
                                                class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                                            </th>
                                            <th scope="row"
                                                class="pt-4 pl-4 pr-3 text-sm font-normal text-left text-slate-700 sm:hidden">
                                                Total
                                            </th>
                                            <td
                                                class="pt-4 pl-3 pr-4 text-sm font-normal text-right text-slate-700 sm:pr-6 md:pr-0">
                                                {{ $r->precio_total }} €
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="bottom-0 p-9 suelo">
                            <div class="border-t pt-9 border-slate-200">
                                <div class="text-sm font-light text-slate-700">
                                    <p>
                                        Payment terms are 14 days. Please be aware that according to the
                                        Late Payment of Unwrapped Debts Act 0000, freelancers are
                                        entitled to claim a 00.00 late fee upon non-payment of debts
                                        after this time, at which point a new invoice will be submitted
                                        with the addition of this fee. If payment of the revised invoice
                                        is not received within a further 14 days, additional interest
                                        will be charged to the overdue account and a statutory rate of
                                        8% plus Bank of England base of 0.5%, totalling 8.5%. Parties
                                        cannot contract out of the Act’s provisions.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    @endforeach


</body>

</html>
