@extends('layouts.default')
@section('title', 'Home')
@section('content')





    <div class="container">
        <h2 class="text-center">Upload Document</h2>
        <hr>

        <div id="errorMessages" class="alert alert-danger d-none"></div>
        <div id="successMessage" class="alert alert-success d-none"></div>
        <div id="documentContent" class="alert alert-success d-none"></div>

        <form id="documentUploadForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2 text-center">
                <a href="{{ asset('uploads/1727779423_dummypdf.pdf') }}">Download Dummy PDF</a>
            </div>
        <hr>

            <div class="hello">
                <div class="form-group mt-2">
                    <div class="frame">
                        <div class="center">
                            <div class="title">
                                <h1>Drop file to upload</h1>
                            </div>

                            <div class="dropzone">
                                <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                                <input type="file" class="upload-input" name="document" />
                            </div>

                            <button type="submit" class="btns" name="uploadbutton">Upload file</button>

                        </div>
                    </div>

                </div>
            </div>

        </form>


        <hr>
        <h3 class="text-center">List Documents</h3>
        <table class="table table-bordered" id="documentTable" style="background: #EC58AD;color:white">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Document Name</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>


@stop
