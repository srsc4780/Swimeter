<form class="ui small ajax form" action="{{ $action }}" method="post" data-redirect="on">
    <div class="field">
        <label for="ctrl_name">Full name</label>
        <input id="ctrl_name" name="name" value="{{ $user->name }}">
    </div>

    <div class="field">
        <label for="ctrl_email">Email address</label>
        <input id="ctrl_email" type="email" name="email" value="{{ $user->email }}">
    </div>

    <div class="field">
        <label for="ctrl_phone">Phone number</label>
        <input id="ctrl_phone" type="tel" name="phone" value="{{ $user->phone }}">
    </div>

    <div class="field">
        <label for="ctrl_customer_type">Customer type</label>
        @if (empty($userTypeEditable))
            <input id="ctrl_customer_type" value="{{ optional($user->status)->type }}" disabled>
        @else
            <select id="ctrl_customer_type" name="customer_type" class="ui selection dropdown">
                <option value="regular" @isSelected(optional($user->status)->type == 'regular')>Regular</option>
                <option value="official" @isSelected(optional($user->status)->type == 'official')>Official</option>
            </select>
        @endif
    </div>

    @php $address = optional($user->address) @endphp
    <h4 class="ui header">Billing Address</h4>
    <div class="field">
        <label>Street Address</label>
        <input id="ctrl_address_line_1" name="address_line_1" value="{{ $address->address_line_1 }}" placeholder="Address Line 1">
    </div>

    <div class="field">
        <input id="ctrl_address_line_2" name="address_line_2" value="{{ $address->address_line_2 }}" placeholder="Address Line 2">
    </div>

    <div class="field">
        <div class="two fields">
            <div class="ten wide field">
                <label for="ctrl_locality">City</label>
                <input id="ctrl_locality" name="locality" value="{{ $address->locality }}">
            </div>

            <div class="six wide field">
                <label for="ctrl_postal_code">Postal / ZIP Code</label>
                <input id="ctrl_postal_code" name="postal_code" value="{{ $address->postal_code }}">
            </div>
        </div>
    </div>

    <div class="field">
        <div class="two fields">
            <div class="seven wide field">
                <label for="ctrl_administrative_area">State / County</label>
                <input id="ctrl_administrative_area" name="administrative_area" value="{{ $address->administrative_area }}">
            </div>

            <div class="nine wide field">
                <label for="ctrl_country">Country</label>
                <select id="ctrl_country" class="ui fluid search selection dropdown" name="country">
                    @foreach (country()->all() as $code => $name)
                        <option value="{{ $code }}" @isSelected($code == ($address->country ?? 'BD')) >{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <h4 class="ui header">@if ($user->exists) Change @endif Password</h4>
    <div class="field">
        <label for="ctrl_password">Password</label>
        <input type="password" id="ctrl_password" name="password">
        <small class="hint">Keep this empty if you don't want to change the password.</small>
    </div>

    <div class="field">
        <label for="ctrl_password_confirmation">Confirm Password</label>
        <input type="password" id="ctrl_password_confirmation" name="password_confirmation">
    </div>

    <button class="ui icon labeled green button">
        <i class="save icon"></i>
        Save
    </button>
</form>
