<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table td:nth-child(3) {
            text-align: right;
        }
        .invoice-box table td:nth-child(4) {
            text-align: right;
        }
        .invoice-box table td:nth-child(5) {
            text-align: right;
        }
        .invoice-box table tr.total td:nth-child(4) {
            border-top: 2px solid #eee;
        }
        .invoice-box table tr.total td:nth-child(5) {
            border-top: 2px solid #eee;
        }
        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }
        .rtl table {
            text-align: right;
        }
        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">


    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="5">
                <table>
                    <tr>
                        <td class="title">
                                <img src="{{public_path('/storage/images/logo.svg')}}"  style="width: 10%" height="40">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 15px">Invoice Number {{ $Order->id }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="5">
                <table>
                    <tr>
                        <td>
                        <p style="font-size: 20px; font-weight: bold">Groene Vingers</p>
                        <p style="font-size: 15px">Tuinstraat 167</p>
                        <p style="font-size: 15px">2587 WD Nuenen</p>
                        <p style="font-size: 15px">Nederland</p>
                        <p style="font-size: 15px">06-33024999</p>
                        <p style="font-size: 15px">info@groenevingersshop.com</p>

                        </td>

                        <td style="text-align: right">
                         <p style="font-size: 20px; font-weight: bold">{{ $Order->first_name }} {{ $Order->last_name }}</p>
                        <p style="font-size: 15px">{{ $Order->address }}</p>
                        <p style="font-size: 15px">{{ $Order->zip }} {{ $Order->city }}</p>
                        <p style="font-size: 15px">{{ $Order->country }}</p>
                        <p style="font-size: 15px">{{ $Order->phone }}</p>
                        <p style="font-size: 15px">{{ $Order->email }}</p>
                        </td>

                    </tr>
                </table>
                <strong><small></small></strong>
            </td>
        </tr>
        <tr class="heading">
            <td>
                #
            </td>
            <td>
                Product
            </td>

            <td>
                Prijs
            </td>
            <td>
                Aantal
            </td>
            <td>
                Totaal
            </td>
        </tr>
        @foreach($order_items as $order_item)

                <tr class="item">
                    <td>
                    <img src="{{$order_item->image}}" style="width: 40%" height="40">
                    </td>
                    <td>
                        <strong>{{ $order_item->name }}</strong>
                    </td>
                    <td>
                        @if ($order_item->discount_percentage != 0)
                            {{ ($order_item->selling_price * $order_item->discount_percentage) / 100 }}
                        @else
                            {{ $order_item->selling_price }}
                        @endif
                    </td>
                    <td>
                        X {{ $order_item->quantity }}
                    </td>

                    <td>
                        € {{ number_format($order_item->price, 2, '.', ',') }}
                    </td>
                </tr>
        @endforeach
        <tr class="total" style="text-align: left">
            <td></td>
            <td></td>
            <td></td>
            <td>Subtotaal<br>

                Verzenden<br>
                BTW 21%<br>
                <strong>Totaal</strong><br>
            </td>
            <td style="text-align: right">
                € {{ number_format(($Order->total -($Order->total * 21) / 100), 2, '.', ',') }}<br>
                € 0.00<br>
                € {{ number_format(($Order->total * 21) / 100, 2, '.', ',') }}<br>
                <strong>€ {{ number_format($Order->total , 2, '.', ',') }}</strong><br>
            </td>
        </tr>
    </table>
    <hr>
    <p style="text-align: center">Thank you for your business!</p>


</div>
</body>
</html>
