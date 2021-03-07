{{--Form Contact--}}
<div class="contact-map-wrapper">
    <div class="contact-message">
        <div class="contact-title">
            <h4>Gửi yêu cầu</h4>
        </div>

{{--        @if ($errors->any())--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        @endif--}}
        <form id="contact-form" class="contact-form" action="{{route('shop.postContact')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-input-style mb-20">
                        <label for='name'>Họ tên <span class="text-danger">*</span></label>
                        <input name="name" id="name" value="{{old('name')}}" type="text">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="contact-input-style mb-20">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input id="email" name="email" type="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-input-style mb-20">
                        <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
                        <input id="phone" name="phone" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="select-option-part mb-20">
                        <label for="subject">Yêu cầu</label>
                        <select id="subject" name="subject" class="" aria-required="true" aria-invalid="false">
                            <option value="Chọn yêu cầu">Chọn yêu cầu</option>
                            <option value="Yêu cầu thiết kế website">Yêu cầu thiết kế website</option>
                            <option value="Yêu cầu thiết kế Web-app">Yêu cầu thiết kế Web-app</option>
                            <option value="Yêu cầu lập trình smartphone app">Yêu cầu lập trình smartphone app</option>
                            <option value="Yêu cầu Outsourcing">Yêu cầu Outsourcing</option>
                            <option value="Yêu cầu cộng tác">Yêu cầu cộng tác</option>
                            <option value="Gia nhập Mona Media">Gia nhập Mona Media</option></select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="contact-textarea-style mb-20">
                        <label for="message">Nội dung <span class="text-danger">*</span></label>
                        <textarea id="message" class="form-control2" name="message" ></textarea>

                    </div>
                    <button id="submit" class="submit contact-btn btn-hover" type="submit">
                        Gửi ngay
                    </button>

                </div>
            </div>
        </form>
        <div class="alert form-messege mt-10" role="alert">

        </div>


    </div>
</div>



