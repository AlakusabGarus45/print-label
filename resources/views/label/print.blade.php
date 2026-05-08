<!DOCTYPE html>
<html>

<head>
    <title>Print Label</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
        }

        body {
            background: #f2f2f2;
            padding: 10px;
        }

        .label {
            width: 100mm;
            height: 150mm;
            background: #fff;
            /* margin: auto; */
            margin-right: -10px;
            margin-bottom: 10px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .content {
            position: absolute;
            width: 144mm;
            height: 94mm;
            transform: rotate(90deg) translateY(-10mm);
            transform-origin: top left;
            top: 0;
            left: 94mm;
            padding: 10mm;
            padding-top: 5mm;
            text-transform: uppercase;
        }

        .cols {
            display: flex;
            margin-bottom: 18px;
            border-bottom: 1px dashed #999;
            padding-bottom: 5px;
        }

        .from,
        .destination {
            width: 180px;
            font-size: 25px;
            font-weight: bold;
        }

        .from-name,
        .destination-name {
            flex: 1;
            font-size: 25px;
            font-weight: bold;
            word-break: break-word;
        }

        .address {
            width: 190px;
            font-size: 30px;
            font-weight: bold;
        }

        .address-right {
            flex: 1;
            font-size: 35px;
            font-weight: bold;
            word-break: break-word;
        }

        .left {
            width: 190px;
            font-weight: bold;
            font-size: 25px;
        }

        .right {
            flex: 1;
            font-size: 25px;
            word-break: break-word;
        }

        .cartoon-box {
            margin-top: 25px;
            border: 3px dashed #000;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            font-size: 35px;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .date{
                margin-top: 9mm;
                font-size: 20px;
                text-align: center;
        }

        @media print {

            @page {
                size: 100mm 150mm;
                margin: 0;
            }

            body {
                background: white;
                padding: 0;
                margin: 0;
            }

            .label {
                width: 94mm;
                height: 144mm;
                margin: 0;
                box-shadow: none;
                page-break-after: always;
            }

            .content {
                width: 144mm;
                height: 94mm;
                transform: rotate(90deg) translateY(-10mm);
                transform-origin: top left;
                top: 0;
                left: 94mm;
                padding: 10mm;
                padding-left: 18mm;
                text-transform: uppercase;
            }

            .date{
                margin-top: 9mm;
                font-size: 20px;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    @for ($i = 1; $i <= $cartoonNo; $i++)
        <div class="label">

            <div class="content">

                <div class="cols">
                    <div class="from">FROM</div>
                    <div class="from-name">{{ $from->name }}</div>
                </div>

                <div class="cols">
                    <div class="destination">TO</div>
                    <div class="destination-name">{{ $to->name }}</div>
                </div>

                <div class="cols">
                    <div class="address">ADDRESS</div>
                    <div class="address-right">{{ $to->address }}</div>
                </div>

                <div class="cols">
                    <div class="left">CONTACT</div>
                    <div class="right">{{ $to->contact }}</div>
                </div>

                <div class="cartoon-box">
                    CARTOON {{ $i }} OF {{ $cartoonNo }}<br>
                </div>
            </div>
            <div class="date">
                {{ $date->format('Y-m-d') }}
            </div>
        </div>
    @endfor

    <script>
        window.onload = function() {
            window.print();
        }
    </script>

</body>

</html>
