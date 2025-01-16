@extends('layouts.frontend')

<div class="contact" style="padding-top: 8rem; padding-bottom: 8rem;">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h2 class="">Contact Kami</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-6">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email">
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Beri Komentar</label>
                    <textarea class="form-control" id="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>