@extends('layouts.app')
@section('content')
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    @foreach($products as $product)
                        <div class="p-6 post">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    <a href="{{route('show', $product->id)}}" class="underline text-gray-900 dark:text-white">
                                       დასახელება: {{$product->name}}
                                    </a>
                                </div>
                                <div class="ml-12">
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        ფაის ${{$product->price}}
                                    </div>
                                </div>
                                @can('update', $product)
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    <a href="{{route('edit', $product->id)}}" class="underline text-gray-900 dark:text-white">
                                        <i>edit</i>
                                    </a>
                                </div>
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    <button type="submit" class="fa fa-trash btn-delete" url="{{route('delete',$product->id)}}"></button>
                                </div><br>
                                @endcan
                                <div>
                                    <a  href="{{route('show', $product->id)}}" >
                                        <img class="h-25 w-25" src="{{asset('uploads/product/'.$product->image )}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
