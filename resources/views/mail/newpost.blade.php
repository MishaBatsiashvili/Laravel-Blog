<x-mail-layout>

    <x-slot name="head">
        <head>
            <style>
                body {
                    color: black;
                    font-family: Helvetica, sans-seri;
                    background-color: #FFF6EF;
                }

                .parent-table{
                    max-width: 600px;
                    margin: auto;
                }

                .text-yellow {
                    color: red !important;
                    font-family: 'Work Sans', sans-serif;
                }

                .d-block{
                    display: block;
                }

                .image-centered{
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .image-wrp{
                    position: relative;
                    padding-top: 50%;
                }

                .title{
                    padding-top: 20px;
                    margin: 0;
                }

                .author{
                    padding-top: 10px;
                    color: rgb(133, 133, 133);
                }

                .excerpt{
                    padding-top: 20px;
                    margin: 0;
                    color: rgb(133, 133, 133);
                }

                .link-wrp{
                    padding-top: 30px;
                }

                .link-wrp a {
                    padding: 10px 20px !important;
                    background: rgb(234, 88, 12) !important;
                    color: white !important;
                    text-decoration: none !important;
                    border-radius: 5px !important;
                    display: inline-block !important;
                }

            </style>
        </head>
    </x-slot>

    @if(isset($name) && isset($post))
    <table class="parent-table">
        <tbody>
            <tr>
                <td>
                    <div>
                        <div class="image-wrp">
                            <img
                                class="d-block image-centered"
                                src="{{ asset('/storage/'.$post->thumbnail) }}"
                                alt="{{ $post->title }}"
                            >
                        </div>
                    </div>
                    <div class="author">By {{ ucwords($name) }}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="p-5">

                        <h2 class="title">{{ $post->title }}</h2>
                        <p class="excerpt">{{ $post->excerpt }}</p>

                        <div class="link-wrp">
                            <a
                                href={{ route('posts.show', ['post' => $post->id]) }}
                            >
                                Go to Post
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    @else
    <h1>no data provided</h1>
    @endif
</x-mail-layout>
