@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Setting') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">

                @include('common.flash_message')

                <form action="{{ route('admin.setting.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-7">
                            <div class="input-style-1">
                                <label for="message">{{ __('Website Message') }}</label>
                                <textarea name="message" id="message" placeholder="{{ __('Website Message') }}"
                                    class="form-control @error('message') is-invalid @enderror" rows="5">{{ isset($setting['message']) ? $setting['message'] : old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-style-1">
                                <label for="address">{{ __('Address') }}</label>
                                <input type="text" name="address" id="address" placeholder="{{ __('Address') }}"
                                    class="form-control @error('address') is-invalid @enderror"
                                    value="{{ isset($setting['address']) ? $setting['address'] : old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-style-1">
                                <label for="google_map">{{ __('Google Map') }}</label>
                                <textarea name="google_map" id="google_map" placeholder="{{ __('Google Map') }}"
                                    class="form-control @error('google_map') is-invalid @enderror" rows="5">{{ isset($setting['google_map']) ? $setting['google_map'] : old('google_map') }}</textarea>
                                @error('google_map')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="input-style-1">
                                <label for="title">{{ __('Website Title') }}</label>
                                <input type="text" name="title" id="title" placeholder="{{ __('Website Title') }}"
                                    value="{{ isset($setting['title']) ? $setting['title'] : old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-style-1">
                                <label for="email">{{ __('Contact Email') }}</label>
                                <input type="text" @error('email') class="form-control is-invalid" @enderror
                                    name="email" id="email" placeholder="{{ __('Contact Email') }}"
                                    value="{{ isset($setting['email']) ? $setting['email'] : old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-style-1">
                                <label for="phone">{{ __('Phone Number') }}</label>
                                <input type="text" @error('phone') class="form-control is-invalid" @enderror
                                    name="phone" id="phone" placeholder="{{ __('Phone Number') }}"
                                    value="{{ isset($setting['phone']) ? $setting['phone'] : old('phone') }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-style-1">
                                <label for="whatsapp_number">{{ __('Whatsapp Number') }}</label>
                                <input type="text" @error('whatsapp_number') class="form-control is-invalid" @enderror
                                    name="whatsapp_number" id="whatsapp_number" placeholder="{{ __('Whatsapp Number') }}"
                                    value="{{ isset($setting['whatsapp_number']) ? $setting['whatsapp_number'] : old('whatsapp_number') }}" required>
                                @error('whatsapp_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <h6 class="mb-25">Social Media</h6>
                            <div class="input-style-1">
                                <label for="facebook">{{ __('Facebook') }}</label>
                                <input type="url" @error('facebook') class="form-control is-invalid" @enderror
                                    name="facebook" id="facebook" placeholder="{{ __('Facebook Link') }}"
                                    value="{{ isset($setting['facebook']) ? $setting['facebook'] : old('facebook') }}"
                                    required>
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-style-1">
                                <label for="twitter">{{ __('Twitter') }}</label>
                                <input type="url" @error('twitter') class="form-control is-invalid" @enderror
                                    name="twitter" id="twitter" placeholder="{{ __('Twitter Link') }}"
                                    value="{{ isset($setting['twitter']) ? $setting['twitter'] : old('twitter') }}"
                                    required>
                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="main-btn primary-btn btn-hover text-center">
                        {{ __('Submit') }}
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
