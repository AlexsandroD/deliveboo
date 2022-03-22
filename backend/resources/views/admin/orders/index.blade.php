@extends('layouts.app')


@section('content')
    {{-- order col --}}
    <div class="col-lg-9 orders-container">
        <h1 class="text-center mb-3">Ordini</h1>

        @if (count($orders) == 0)
            <div class="text-center orderless">
                <h3>Al momento non ci sono ordini</h3>
                <svg version="1.1" class="peas" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 50"
                    style="enable-background:new 0 0 100 50;" xml:space="preserve">
                    <g class="pea pea-3">
                        <ellipse class="body" cx="80.5" cy="20" rx="19.5" ry="20" />
                        <path class="mouth"
                            d="M77.9,19.5c-0.2,0-0.4,0-0.5,0.1c-0.7,0.3-0.9,1.1-0.7,1.8c0.7,2,2.6,3.5,4.9,3.5 c2.3,0,4.3-1.6,5-3.8c0.1-0.3,0.1-0.6-0.1-0.8c-0.2-0.5-0.7-0.8-1.3-0.8H77.9z" />
                        <path class="tongue"
                            d="M85.2,23.3c-1-1.1-2.4-1.8-4-1.8c-1.4,0-2.7,0.6-3.7,1.5c1,1.2,2.4,1.9,4,1.9 C83,24.9,84.3,24.3,85.2,23.3z" />
                        <ellipse class="eye eye-right" cx="88.5" cy="12" rx="5" ry="5" />
                        <ellipse class="pupil pupil-right" cx="86.6" cy="12.8" rx="1.8" ry="1.8" />
                        <ellipse class="eye eye-left" cx="74.6" cy="12" rx="5" ry="5" />
                        <ellipse class="pupil pupil-left" cx="76.5" cy="12.8" rx="1.8" ry="1.8" />
                        <path class="cheek cheek-left" d="M79.1,19c-0.9-1.2-2.3-1.9-3.9-1.9s-3,0.8-3.9,1.9" />
                        <path class="cheek cheek-right" d="M92.9,19C92,17.8,90.6,17,89.1,17s-3,0.8-3.9,1.9" />
                    </g>
                    <g class="pea pea-1">
                        <ellipse class="body" cx="19.5" cy="20" rx="19.5" ry="20" />
                        <path class="mouth"
                            d="M14.6,19.5c-0.2,0-0.4,0-0.5,0.1c-0.7,0.3-0.9,1.1-0.7,1.8c0.7,2,2.6,3.5,4.9,3.5 c2.3,0,4.3-1.6,5-3.8c0.1-0.3,0.1-0.6-0.1-0.8c-0.2-0.5-0.7-0.8-1.3-0.8H14.6z" />
                        <path class="tongue"
                            d="M21.9,23.3c-1-1.1-2.4-1.8-4-1.8c-1.4,0-2.7,0.6-3.7,1.5c1,1.2,2.4,1.9,4,1.9 C19.7,24.9,21,24.3,21.9,23.3z" />
                        <ellipse class="eye eye-right" cx="25.3" cy="12" rx="5" ry="5" />
                        <ellipse class="pupil pupil-right" cx="23.4" cy="12.8" rx="1.8" ry="1.8" />
                        <ellipse class="eye eye-left" cx="11.4" cy="12" rx="5" ry="5" />
                        <ellipse class="pupil pupil-left" cx="13.2" cy="12.8" rx="1.8" ry="1.8" />
                        <path class="cheek cheek-left" d="M11.4,17c-1.6,0-3,0.8-3.9,1.9h7.8C14.3,17.8,12.9,17,11.4,17z" />
                        <path class="cheek cheek-right" d="M25.2,17c-1.6,0-3,0.8-3.9,1.9H29C28.1,17.8,26.7,17,25.2,17z" />
                    </g>
                    <g class="pea pea-2">
                        <ellipse class="body" cx="50" cy="20" rx="19.5" ry="20" />
                        <path class="mouth"
                            d="M47.1,19.5c-0.2,0-0.4,0-0.5,0.1c-0.7,0.3-0.9,1.1-0.7,1.8c0.7,2,2.6,3.5,4.9,3.5 c2.3,0,4.3-1.6,5-3.8c0.1-0.3,0.1-0.6-0.1-0.8c-0.2-0.5-0.7-0.8-1.3-0.8H47.1z" />
                        <path class="tongue"
                            d="M54.5,23.3c-1-1.1-2.4-1.8-4-1.8c-1.4,0-2.7,0.6-3.7,1.5c1,1.2,2.4,1.9,4,1.9 C52.2,24.9,53.5,24.3,54.5,23.3z" />
                        <ellipse class="eye eye-right" cx="57.8" cy="12" rx="5" ry="5" />
                        <ellipse class="pupil pupil-right" cx="55.9" cy="12.8" rx="1.8" ry="1.8" />
                        <ellipse class="eye eye-left" cx="43.9" cy="12" rx="5" ry="5" />
                        <ellipse class="pupil pupil-left" cx="45.8" cy="12.8" rx="1.8" ry="1.8" />
                        <path class="cheek cheek-left" d="M47.8,19c-0.9-1.2-2.3-1.9-3.9-1.9s-3,0.8-3.9,1.9" />
                        <path class="cheek cheek-right" d="M61.6,19c-0.9-1.2-2.3-1.9-3.9-1.9s-3,0.8-3.9,1.9" />
                    </g>
                    <path class="base-bottom"
                        d="M50,29.8c-19.9,0-37.7-3.8-49.9-9.7c0,0.3,0,0.7,0,1C0,37.1,22.4,50,50,50s50-12.9,50-28.9 c0-0.3,0-0.7,0-1C87.7,26.1,69.9,29.8,50,29.8z" />
                    <path class="base-top"
                        d="M49.5,29.8C30.1,29.8,12.9,26.6,0,20c10.8,13.5,29.2,22.4,50,22.4c20.8,0,39.2-8.8,50-22.4 C86.9,26.9,69.1,29.8,49.5,29.8z" />
                </svg>
                <script>
                    'use strict';

                    const svg = document.querySelector('.peas');
                    let mouseX = 0;
                    let mouseY = 0;
                    let pupilPadding = 1.5;

                    // ------------
                    // Mouse events
                    // ------------

                    window.addEventListener('mousemove', mouseMove);

                    function mouseMove(e) {
                        mouseX = e.clientX;
                        mouseY = e.clientY;
                    }

                    // ---
                    // Pea
                    // ---

                    class Pea {
                        constructor(className) {
                            this.pea = svg.querySelector(className);
                            this.eyeLeft = {
                                element: this.pea.querySelector('.eye-left'),
                                get radius() {
                                    return parseInt(this.element.getAttribute('rx'))
                                },
                                get xMin() {
                                    return parseInt(this.element.getAttribute('cx')) - this.radius + pupilPadding
                                },
                                get xMax() {
                                    return parseInt(this.element.getAttribute('cx')) + this.radius - pupilPadding
                                },
                                get yMin() {
                                    return parseInt(this.element.getAttribute('cy')) - this.radius + pupilPadding
                                },
                                get yMax() {
                                    return parseInt(this.element.getAttribute('cy')) + this.radius - pupilPadding
                                },
                                get center() {
                                    return getItemCenter(this.element.getAttribute('cx'), this.element.getAttribute('cy'))
                                }
                            };
                            this.eyeRight = {
                                element: this.pea.querySelector('.eye-right'),
                                get radius() {
                                    return parseInt(this.element.getAttribute('rx'))
                                },
                                get xMin() {
                                    return parseInt(this.element.getAttribute('cx')) - this.radius + pupilPadding
                                },
                                get xMax() {
                                    return parseInt(this.element.getAttribute('cx')) + this.radius - pupilPadding
                                },
                                get yMin() {
                                    return parseInt(this.element.getAttribute('cy')) - this.radius + pupilPadding
                                },
                                get yMax() {
                                    return parseInt(this.element.getAttribute('cy')) + this.radius - pupilPadding
                                },
                                get center() {
                                    return getItemCenter(this.element.getAttribute('cx'), this.element.getAttribute('cy'))
                                }
                            };
                            this.pupilLeft = {
                                element: this.pea.querySelector('.pupil-left'),
                                get radius() {
                                    return parseInt(this.element.getAttribute('rx'))
                                },
                                get center() {
                                    return getItemCenter(this.element.getAttribute('cx'), this.element.getAttribute('cy'))
                                }
                            }
                            this.pupilRight = {
                                element: this.pea.querySelector('.pupil-right'),
                                get radius() {
                                    return parseInt(this.element.getAttribute('rx'))
                                },
                                get center() {
                                    return getItemCenter(this.element.getAttribute('cx'), this.element.getAttribute('cy'))
                                }
                            }

                            this.pupilLeft.element.setAttribute('cx', this.eyeLeft.xMin + (this.pupilLeft.radius * 2));
                            this.pupilLeft.element.setAttribute('cy', this.eyeLeft.yMin + (this.pupilLeft.radius * 2));

                            this.pupilRight.element.setAttribute('cx', this.eyeRight.xMin + (this.pupilRight.radius * 2));
                            this.pupilRight.element.setAttribute('cy', this.eyeRight.yMin + (this.pupilRight.radius * 2));

                            this.pea.addEventListener('mouseenter', function() {
                                this.classList.add('pea-hovered');
                            });

                            this.pea.addEventListener('mouseleave', function() {
                                this.classList.remove('pea-hovered');
                            });
                        }

                        update() {
                            let amountY = (this.eyeLeft.yMax - this.eyeLeft.yMin - (this.pupilLeft.radius * 3)) * (mouseY / document
                                .body.clientHeight);
                            let amountX = (this.eyeLeft.xMax - this.eyeLeft.xMin - (this.pupilLeft.radius * 3)) * (mouseX / document
                                .body.clientWidth);
                            this.pupilLeft.element.style.transform = `translate(${amountX}px, ${amountY}px)`;
                            this.pupilRight.element.style.transform = `translate(${amountX}px, ${amountY}px)`;
                        }
                    }

                    const peas = [
                        new Pea('.pea-1'),
                        new Pea('.pea-2'),
                        new Pea('.pea-3')
                    ];

                    // --------------
                    // Animation loop
                    // --------------

                    function loop() {
                        for (let pea of peas) {
                            pea.update();
                        }

                        requestAnimationFrame(loop);
                    }

                    loop();

                    // ----------------
                    // Helper functions
                    // ----------------

                    function getItemCenter(x, y) {
                        return {
                            x: document.body.clientWidth / 2 - svg.clientWidth / 2 + (x * window.devicePixelRatio),
                            y: document.body.clientHeight / 2 - svg.clientHeight / 2 + (y * window.devicePixelRatio)
                        };
                    }
                </script>
            </div>
        @else
            {{-- orders grid --}}
            <div class="orders-grid">
                {{-- plate cards --}}
                @foreach ($orders as $order)
                    <div class="card">
                        <a href="{{ route('orders.show', $order->id) }}">
                            <h6 class="card_header text-center">Ordine #{{$order->id}}</h6>
                            <div class="order-info text-center">
                                <div class="label"><i class="fa-solid fa-user"></i> Cliente</div>
                                <p class="mb-4">{{ $order->customer_name }} {{ $order->customer_surname }}</p>
                                <div class="label"><i class="fa-solid fa-clock"></i> {{ $order->created_at}}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- aside lg --}}
    <aside class="col-lg-3 pl-0 aside">

        {{-- card utente --}}
        <h3 class="user-title">
            Utente connesso
        </h3>
        <div id="user-info">
            <ul>
                {{-- nome utente --}}
                <li>
                    <div>
                        <i class="fa-solid fa-user-large"></i>
                        <span>Nome utente</span>
                    </div>
                    <span class="info">
                        {{ Auth::user()->name }} {{ Auth::user()->surname }}
                    </span>
                </li>
                {{-- email utente --}}
                <li>
                    <div>
                        <i class="fa-solid fa-envelope"></i>
                        <span>Email</span>
                    </div>
                    <span class="info">
                        {{ Auth::user()->email }}
                    </span>
                </li>
                {{-- partita iva utente --}}
                <li>
                    <div>
                        <i class="fa-solid fa-briefcase"></i>
                        <span>Partita iva</span>
                    </div>
                    <span class="info">
                        {{ Auth::user()->vat }}
                    </span>
                </li>
            </ul>
        </div>

        {{-- container bottoni --}}
        <div id="btn-container">
            {{-- bottone menu --}}
            <a href="{{ route('restaurants.index') }}" class="text-center restaurant-color">
                <button class="btn">
                    <i class="fa-solid fa-house-chimney-user"></i> Ristorante
                </button>
            </a>
            {{-- bottone ordini --}}
            <a href="{{ route('dishes.index') }}" class="text-center menu-color">
                <button class="btn">
                  <i class="fas fa-utensils responsive-i" aria-hidden="true"></i> Menù
                </button>
            </a>
            {{-- bottone statistiche --}}
            <a href="{{route('statistics')}}" class="text-center stats-color">
                <button class="btn">
                    <i class="fa fa-bar-chart responsive-i" aria-hidden="true"></i> Statistiche
                </button>
            </a>
        </div>
    </aside>
@endsection
