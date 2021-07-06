@extends('layouts.app')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="p-6 post">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    <a>author: {{$product->user->name}}</a>
                                </div>
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    <a href="{{route('show', $product->id)}}" class="underline text-gray-900 dark:text-white">
                                        name: {{$product->name}}
                                    </a>
                                </div>
                                @can('update', $product)
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        <a href="{{route('edit', $product->id)}}" class="underline text-gray-900 dark:text-white">
                                            <i class="fa fa-pencil-scuare">edit</i>
                                        </a>
                                    </div>
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        <button type="submit" class="fa fa-trash btn-delete" url="{{route('delete',$product->id)}}"></button>
                                    </div><br>
                                    <div class="ml-12">
                                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                            ფასი ${{$product->price}}
                                        </div>
                                    </div>
                                @endcan
                                <div>
                                    <a  href="{{route('show', $product->id)}}">
                                        <img class="h-25 w-25" src="{{asset('uploads/product/'.$product->image )}}" alt="">
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.btn-delete', function (e){
                e.preventDefault();
                $this=$(this);
                $.ajax({
                    type: 'DELETE',
                    url: $this.attr('url'),
                    success: function (){
                        $this.closest('.post').remove()
                    }
                });
            });

        });

    </script>
@endsection
