<div class="table-responsive">
    @if(isset($scores))
        <table id="table_score" class="table table-hover table-bordered table-striped">
            <thead id="head">
            <tr>
                <th>Subject Name</th>
                <th class="hidden-sm">Abs</th>
                <th>Credit</th>
                <th>Score</th>
                <th style="width: 100px;">Status</th>
            </tr>
            </thead>

            <tbody id="score">
            @foreach($scores as $score)
                @if(is_array($score))
                    <tr>
                        <td>
                            {{ $score["name_en"] }}
                        </td>
                        <td class="td-width">
                            @if($score['absence'] == null)
                                0
                            @else
                                {{ $score['absence'] }}
                            @endif

                        </td>
                        <td>
                            {{ $score['credit'] }}
                        </td>
                        <td>
                            {{ $score['score'] }}
                        </td>
                        <td>
                            @if($score['score'] < 50)
                                <button class="btn-u btn-block btn-u-aqua btn-u-xs"><i
                                            class="fa fa-level-down margin-right-5"></i> Low
                                </button>
                            @elseif($score['score'] < 60)
                                <button class="btn-u btn-block btn-u-yellow btn-u-xs"><i
                                            class="fa fa-arrows-v margin-right-5"></i> Middle
                                </button>
                            @elseif($score['score'] < 80)
                                <button class="btn-u btn-block btn-u-dark btn-u-xs"><i
                                            class="icon-graph margin-right-5"></i> Fairly good
                                </button>
                            @else
                                <button class="btn-u btn-block btn-u-green btn-u-xs"><i
                                            class="fa fa-level-up margin-right-5"></i> High
                                </button>
                            @endif
                        </td>

                    </tr>
                @endif
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td rowspan="2">Average <br/> GPA</td>
                <td rowspan="2">
                    @if(isset($scores['final_score']))
                        {{ isset($scores['final_score'])?$scores['final_score']: 0 }}
                        @if( $scores['final_score'] < 50 )
                            <p>1.5</p>
                        @elseif( $scores['final_score'] < 65 )
                            <p>2.0</p>
                        @elseif( $scores['final_score'] < 70 )
                            <p>2.5</p>
                        @elseif( $scores['final_score'] < 80 )
                            <p>3.0</p>
                        @elseif( $scores['final_score'] < 85)
                            <p>3.5</p>
                        @else
                            <p>4.0</p>
                        @endif
                    @else
                        0
                    @endif
                </td>
                <td>
                    @if($scores['final_score'] < 50)
                        <button class="btn-u btn-block btn-u-aqua btn-u-xs"><i
                                    class="fa fa-level-down margin-right-5"></i> Low
                        </button>
                    @elseif($scores['final_score'] < 60)
                        <button class="btn-u btn-block btn-u-yellow btn-u-xs"><i
                                    class="fa fa-arrows-v margin-right-5"></i> Middle
                        </button>
                    @elseif($scores['final_score'] < 80)
                        <button class="btn-u btn-block btn-u-dark btn-u-xs"><i class="icon-graph margin-right-5"></i>
                            Fairly good
                        </button>
                    @else
                        <button class="btn-u btn-block btn-u-green btn-u-xs"><i
                                    class="fa fa-level-up margin-right-5"></i> High
                        </button>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    @else
        <p>No score to view in this academic year</p>
    @endif
</div>
{{--<tr>--}}
{{--<td>--}}
{{--<a href="#">HP Enterprise Service</a>--}}
{{--</td>--}}
{{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu.</td>--}}
{{--<td>--}}
{{--<div class="m-marker">--}}
{{--<a href="#"><i class="color-green fa fa-map-marker"></i></a>--}}
{{--<a href="#" class="display-b">USA</a>--}}
{{--<a href="#">Palo Alto</a>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td>--}}
{{--<div class="progress progress-u progress-xxs">--}}
{{--<div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%">--}}
{{--</div>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td><button class="btn-u btn-u-red btn-block btn-u-xs"><i class="fa fa-sort-amount-desc margin-right-5"></i> Deep</button></td>--}}
{{--<td>--}}
{{--<span>1(123) 456</span>--}}
{{--<span><a href="#">info@example.com</a></span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td>--}}
{{--<a href="#">Samsung Electronics</a>--}}
{{--</td>--}}
{{--<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu.</td>--}}
{{--<td>--}}
{{--<div class="m-marker">--}}
{{--<a href="#"><i class="color-green fa fa-map-marker"></i></a>--}}
{{--<a href="#" class="display-b">South Korea</a>--}}
{{--<a href="#">Suwon</a>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td>--}}
{{--<div class="progress progress-u progress-xxs">--}}
{{--<div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: 76%">--}}
{{--</div>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td><button class="btn-u btn-block btn-u-dark btn-u-xs"><i class="icon-graph margin-right-5"></i> High</button></td>--}}
{{--<td>--}}
{{--<span>1(123) 456</span>--}}
{{--<span><a href="#">info@example.com</a></span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td>--}}
{{--<a href="#">LG</a>--}}
{{--</td>--}}
{{--<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu.</td>--}}
{{--<td>--}}
{{--<div class="m-marker">--}}
{{--<a href="#"><i class="color-green fa fa-map-marker"></i></a>--}}
{{--<a href="#" class="display-b">South Korea</a>--}}
{{--<a href="#">Seoul</a>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td>--}}
{{--<div class="progress progress-u progress-xxs">--}}
{{--<div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">--}}
{{--</div>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td><button class="btn-u btn-block btn-u-aqua btn-u-xs"><i class="fa fa-level-down margin-right-5"></i> Low</button></td>--}}
{{--<td>--}}
{{--<span>1(123) 456</span>--}}
{{--<span><a href="#">info@example.com</a></span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td>--}}
{{--<a href="#">Sony Corporation</a>--}}
{{--</td>--}}
{{--<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu.</td>--}}
{{--<td>--}}
{{--<div class="m-marker">--}}
{{--<a href="#"><i class="color-green fa fa-map-marker"></i></a>--}}
{{--<a href="#" class="display-b">Japan</a>--}}
{{--<a href="#">Tokyo</a>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td>--}}
{{--<div class="progress progress-u progress-xxs">--}}
{{--<div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 92%">--}}
{{--</div>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td><button class="btn-u btn-block btn-u-yellow btn-u-xs"><i class="fa fa-arrows-v margin-right-5"></i> Middle</button></td>--}}
{{--<td>--}}
{{--<span>1(123) 456</span>--}}
{{--<span><a href="#">info@example.com</a></span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td>--}}
{{--<a href="#">Lenovo Group</a>--}}
{{--</td>--}}
{{--<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu.</td>--}}
{{--<td>--}}
{{--<div class="m-marker">--}}
{{--<a href="#"><i class="color-green fa fa-map-marker"></i></a>--}}
{{--<a href="#" class="display-b">Chinese</a>--}}
{{--<a href="#">Beijing</a>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td>--}}
{{--<div class="progress progress-u progress-xxs">--}}
{{--<div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">--}}
{{--</div>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td><button class="btn-u btn-block btn-u-green btn-u-xs"><i class="fa fa-level-up margin-right-5"></i> High</button></td>--}}
{{--<td>--}}
{{--<span>1(123) 456</span>--}}
{{--<span><a href="#">info@example.com</a></span>--}}
{{--</td>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td>--}}
{{--<a href="#">Acer</a>--}}
{{--</td>--}}
{{--<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu.</td>--}}
{{--<td>--}}
{{--<div class="m-marker">--}}
{{--<a href="#"><i class="color-green fa fa-map-marker"></i></a>--}}
{{--<a href="#" class="display-b">Taiwan</a>--}}
{{--<a href="#">Taipei</a>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td>--}}
{{--<div class="progress progress-u progress-xxs">--}}
{{--<div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">--}}
{{--</div>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td><button class="btn-u btn-block btn-u-blue btn-u-xs"><i class="icon-graph margin-right-5"></i> Stabile</button></td>--}}
{{--<td>--}}
{{--<span>1(123) 456</span>--}}
{{--<span><a href="#">info@example.com</a></span>--}}
{{--</td>--}}
{{--</tr>--}}
