<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Inovice - {{ $checkout->reff_id }}</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
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

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
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

        .invoice-box table tr.heading-item td {
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #fff;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="image/partner/Swimfest primary logo.png"
                                    style="width: 100%; max-width: 150px" />
                            </td>
                            <td>
                                Invoice Pembayaran<br />
                                <strong>{{ $regisData->status == 'Success' ? 'Berhasil' : $regisData->status }}</strong><br />
                                {{ strtoupper($checkout->payment_method) }}<br />
                                {{ \Carbon\Carbon::parse($checkout->updated_at)->locale('id')->timezone('Asia/Jakarta')->isoFormat('D MMMM YYYY HH:mm') }}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading-item">
                <td>Daftar Peserta & Nomor Renang</td>

                <td></td>
            </tr>
            @foreach ($parCat as $item)
                <tr class="heading">
                    <td>Detail</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>No Reg</td>

                    <td>{{ $item->participantRegistration->registrationId->no_registration }}</td>
                </tr>

                <tr class="item">
                    <td>Nama</td>

                    <td>{{ $item->participantRegistration->participantId->participant_name }}</td>
                </tr>

                <tr class="item">
                    <td>No Renang</td>
                    <td>{{ $item->no_renang }}</td>
                </tr>
                <tr class="item">
                    <td>Nomor</td>

                    <td>
                        @foreach ($item->categories as $c)
                            {{ $c->category_name }}
                        @endforeach
                    </td>
                </tr>
                <tr class="item">
                    <td>Kelompok/ Umur</td>
                    <td>
                        @foreach ($item->classId as $class)
                            {{ $class->class_name }}
                        @endforeach
                    </td>
                </tr>
                <tr class="item">
                    <td>Jarak</td>
                    <td>{{ $item->jarak }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td></td>

                <td>Total: Rp. {{ number_format($checkout->grand_total, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
