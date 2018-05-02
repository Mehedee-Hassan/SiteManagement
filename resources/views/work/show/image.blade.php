@extends('dashboard.layouts.main')

@section('page-name')
    <li class="breadcrumb-item active">
        Images
    </li>

@endsection

@section('content')



            <!-- File Button -->
            <div class="col-md-12">
{{--{{dd($images)}}--}}

                @if($flag == 1)
                @foreach($images as $image2)


                    <?php $test =1 ?>
                    @foreach($image2 as $image)
                        {{--{{ dd($image2) }}--}}
                        @if($test==1)
                            <strong>
                                {{\Carbon\Carbon::parse($image["update_date"])->format('d-m-Y')}}
                            </strong>
                            <hr>
                            <br/>
                                <?php $test =2 ?>

                            @endif

                        <div  class="image-container-edit">

                            <img class="img-popup" src="{{ url('file/get', $image['name'])}}" style="height:130px ;width: auto"/>
                            <small>
                            <span class="bottom-text text-center" style=" position: relative; bottom: 0">
                                {{ is_null(\App\Work::where('id',$image['work_id'])->first())? "work place unknown": \App\Work::where('id',$image['work_id'])->first()->work_place }}
                            </span>
                            </small>
                        </div>

                    @endforeach

                        <br/>
                        <br/>
                @endforeach
                @elseif($flag == 2)
                    <?php $test =1 ?>

                  @foreach($images as $image)


{{--                        @foreach($image2 as $image)--}}
                            {{--{{ dd($image2) }}--}}
                            @if($test==1)
                                <strong>
                                    {{\Carbon\Carbon::parse($image["update_date"])->format('d-m-Y')}}
                                </strong>
                                <hr>
                                <br/>
                                <?php $test =2 ?>

                            @endif

                            <div  class="image-container-edit">

                                <img class="img-popup" src="{{ url('file/get', $image['name'])}}" style="height:130px ;width: auto"/>
                                <small>
                            <span class="bottom-text text-center" style=" position: relative; bottom: 0">
                                {{ is_null(\App\Work::where('id',$image['work_id']))? "work place unknown": \App\Work::where('id',$image['work_id'])->first()->work_place }}
                            </span>
                                </small>
                            </div>

                        @endforeach

                        @elseif($flag == 3)

                        @foreach($images as $image2)


                                <?php $test =1 ?>
                                    @foreach($image2 as $image)
                                        {{--{{ dd($image2) }}--}}
                                        @if($test==1)
                                            <strong>
                                                {{ is_null(\App\Work::where('id',$image['work_id']))? "work place unknown": \App\Work::where('id',$image['work_id'])->first()->work_place }}




                                                {{   is_null(\App\Work::find($image['work_id']))? "" : \App\Work::find($image['work_id'])->port()->first()->name}}

                                            </strong>
                                            <hr>
                                            <br/>
                                            <?php $test =2 ?>

                                        @endif

                                        <div  class="image-container-edit">

                                            <img class="img-popup" src="{{ url('file/get', $image['name'])}}" style="height:130px ;width: auto"/>
                                            <small>
                                            <span class="bottom-text text-center" style=" position: relative; bottom: 0">
                                                      {{\Carbon\Carbon::parse($image["update_date"])->format('d-m-Y')}}

                                            </span>
                                            </small>
                                        </div>

                                    @endforeach
                                    <br/>
                                    <br/>
                            @endforeach
                @endif
            </div>


    <br/>
    <br/>

            <div class="overlay-dark"></div>
            <img class="img-overlay">
@endsection

@section('extra-js')
    <script>
        $(function(){
//            $("img").popImg();
        })

    </script>
@endsection



@section('extra-css')
    <style>

        .img-overlay {
            position: fixed;
            top: 90px;
            max-height: 80%;
            left: 50%;
            transform: translate(-50%, 0) scale(0, 0);
            z-index: 10;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            transition: all .3s ease;
        }

        .overlay-dark {
            top: 0;
            position: fixed;
            background-color: #000;
            opacity: .9;
            width: 100%;
            height: 100%;
            z-index: 5;
            display: none;
        }
    </style>
@endsection



