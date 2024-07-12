@extends('layouts.bladeApp')
@section('content')
    <div class="container">

        <div class="row gy-4" style="justify-content: space-evenly">

            <div class="col-lg-3 col-md-6 card" data-aos="zoom-in" data-aos-delay="200">
                <div class="pricing-tem">
                    <h3 class="text-center mt-2" style="color: #0dcaf0;">Стандартный план</h3>
                    <div class="text-center"><h4>$ 19<span> / мес</span></h4></div>
                    <div class="icon">
                        <i class="bi bi-send" style="color: #0dcaf0;"></i>
                    </div>
                    <ul>
                        <li>Неограниченное количество команд</li>
                        <li>Неограниченное количество человек в команде</li>
                        <li>Неограниченное количество задач</li>
                        <li>Уникальные темы</li>
                        <li>Статистика</li>
                        <li>Собственные статусы задач</li>
                    </ul>
                </div>
                <form class="mb-2" action="{{ route('premiumBuyUpdate') }}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-success w-100">КУПИТЬ</button>
                </form>
            </div><!-- End Pricing Item -->

            <div class="col-lg-3 col-md-6 card" data-aos="zoom-in" data-aos-delay="300">
                <div class="pricing-tem">
                    <h3 class="text-center mt-2" style="color: #f86e23;">Годовой план</h3>
                    <div class="text-center"><h4>$ 200<span> / год</span></h4></div>
                    <div class="icon">
                        <i class="bi bi-airplane" style="color: #fd7e14;"></i>
                    </div>
                    <ul>
                        <li>Неограниченное количество команд</li>
                        <li>Неограниченное количество человек в команде</li>
                        <li>Неограниченное количество задач</li>
                        <li>Уникальные темы</li>
                        <li>Статистика</li>
                        <li>Собственные статусы задач</li>
                    </ul>
                </div>
                <form class="mb-2" action="{{ route('premiumBuyUpdate') }}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-success w-100">КУПИТЬ</button>
                </form>
            </div><!-- End Pricing Item -->

            <div class="col-lg-3 col-md-6 card" data-aos="zoom-in" data-aos-delay="400">
                <div class="pricing-tem">
                    <h3 class="text-center mt-2" style="color: #da3e3e;">Бизнес-план</h3>
                    <div class="text-center"><h4>$ 500<span> / мес</span></h4></div>
                    <div class="icon">
                        <i class="bi bi-rocket" style="color: #0d6efd;"></i>
                    </div>
                    <ul>
                        <li>Неограниченное количество команд и задач</li>
                        <li>Неограниченное количество человек в команде</li>
                        <li>Автоматизация Вашего бизнеса под ключ</li>
                        <li>Уникальные темы</li>
                        <li>Статистика</li>
                        <li>Собственные статусы задач</li>
                    </ul>
                </div>
                <form class="mb-2" action="{{ route('premiumBuyUpdate') }}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-success w-100">КУПИТЬ</button>
                </form>
            </div><!-- End Pricing Item -->

        </div><!-- End pricing row -->

    </div>
@endsection
