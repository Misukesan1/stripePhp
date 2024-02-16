<?php

class Cart {
        
    /**
     * return list of all products
     *
     * @return array
     */
    public function getAllOfProducts () {
        return [
            [
                'name' => 'ASUS VivoBook 15 N1502ZA-LP1741W',
                'desc' => 'Intel Core i7-12650H 16 Go SSD 512 Go 15.6" LED Full HD 144 Hz Wi-Fi AC/Bluetooth Webcam Windows 11 Famille',
                'pic' => 'ASUS VivoBook 15 N1502ZA-LP1741W.png',
                'price' => 699.95,
            ],
            [
                'name' => 'LDLC SPC-I3-8-240-N',
                'desc' => 'Intel Core i3-1115G4 8 Go SSD 240 Go 15.6" LED Full HD Wi-Fi AC Webcam (sans Windows)',
                'pic' => 'LDLC SPC-I3-8-240-N.png',
                'price' => 339.95,
            ],
            [
                'name' => 'Gigabyte G6 KF-H3FR854SH',
                'desc' => 'Intel Core i7-13620H 16 Go SSD 1 To 16" LED Full HD+ 165 Hz NVIDIA GeForce RTX 4060 8 Go DLSS 3 Wi-Fi 6E/Bluetooth Webcam Windows 11 Famille',
                'pic' => 'Gigabyte G6 KF-H3FR854SH.png',
                'price' => 1249.95,
            ],
            [
                'name' => 'MSI Cyborg 15 A12VF-483FR',
                'desc' => 'Intel Core i7-12650H 32 Go SSD 512 Go 15.6" LED Full HD 144 Hz NVIDIA GeForce RTX 4060 8 Go DLSS 3 Wi-Fi 6/Bluetooth Webcam Windows 11 Famille',
                'pic' => 'MSI Cyborg 15 A12VF-483FR.png',
                'price' => 1399.95,
            ],
            [
                'name' => 'ASUS Vivobook S15 S1504FA-NJ179W',
                'desc' => 'AMD Ryzen 5 7520U 8 Go SSD 512 Go 15.6" LED Full HD Wi-Fi AC/Bluetooth Webcam Windows 11 Famille',
                'pic' => 'ASUS Vivobook S15 S1504FA-NJ179W.png',
                'price' => 499.95,
            ],
            [
                'name' => 'ASUS Zenbook 13 OLED UX325EA-KG907W-EVO avec NumPad',
                'desc' => 'Intel Core i5-1135G7 16 Go SSD 512 Go 13.3" OLED Full HD Wi-Fi 6/Bluetooth Webcam Windows 11 Famille',
                'pic' => 'ASUS Zenbook 13 OLED UX325EA-KG907W-EVO.png',
                'price' => 799.95,
            ],
            [
                'name' => 'Acer Nitro 5 AN517-54-53A2',
                'desc' => 'Intel Core i5-11400H 16 Go SSD 512 Go 17.3" LED Full HD 144 Hz NVIDIA GeForce RTX 3050 4 Go Wi-Fi 6/Bluetooth Webcam Windows 11 Famille',
                'pic' => 'Acer Nitro 5 AN517-54-53A2.png',
                'price' => 849.95,
            ],
            [
                'name' => 'ASUS Zenbook 14 UM3402YA-KP394W avec NumPad',
                'desc' => 'AMD Ryzen 5 7530U 16 Go SSD 512 Go 14" LED Wi-Fi 6E/Bluetooth Webcam Windows 11 Famille',
                'pic' => 'ASUS Zenbook 14 UM3402YA-KP394W.png',
                'price' => 799.96,
            ],
            [
                'name' => 'MSI Thin GF63 12UCX-809XFR',
                'desc' => 'Intel Core i7-12650H 32 Go SSD 512 Go 15.6" LED Full HD 144 Hz NVIDIA GeForce RTX 2050 4 Go Wi-Fi 6/Bluetooth Webcam (sans Windows)',
                'pic' => 'MSI Thin GF63 12UCX-809XFR.png',
                'price' => 849.95,
            ],
            [
                'name' => 'MSI Modern 15 B12MO-689FR',
                'desc' => 'Intel Core i5-1235U 16 Go SSD 512 Go 15.6" LED Full HD Wi-Fi 6/Bluetooth 5.2 Webcam Windows 11 Famille',
                'pic' => 'MSI Modern 15 B12MO-689FR.png',
                'price' => 619.95,
            ],
            [
                'name' => 'ASUS Vivobook 16 S1605VA-MB576W',
                'desc' => 'Intel Core i7-13700H 16 Go SSD 1 To 16" LED Full HD+ Wi-Fi AC/Bluetooth Webcam Windows 11 Famille',
                'pic' => 'ASUS Vivobook 16 S1605VA-MB576W.png',
                'price' => 919.94,
            ],
            [
                'name' => 'ASUS VivoBook S 16 Flip TN3604YA-MC004W',
                'desc' => 'AMD Ryzen 5 7530U 16 Go SSD 512 Go 16" LED Tactile Full HD+ Wi-Fi 6E/Bluetooth Webcam Windows 11 Famille',
                'pic' => 'ASUS VivoBook S 16 Flip TN3604YA-MC004W.png',
                'price' => 819.95,
            ],
            [
                'name' => 'LDLC SPC-I3-8-240',
                'desc' => 'Intel Core i3-1115G4 8 Go SSD 240 Go 15.6" LED Full HD Wi-Fi AC Webcam Linux Mint 21 LTS',
                'pic' => 'LDLC SPC-I3-8-240.png',
                'price' => 349.95,
            ],
            [
                'name' => 'ASUS F17-TUF706HF-HX014',
                'desc' => 'Intel Core i5-11400H 16 Go SSD 512 Go 17.3" LED Full HD 144 Hz NVIDIA GeForce RTX 2050 4 Go Wi-Fi 6/Bluetooth (sans Windows)',
                'pic' => 'ASUS F17-TUF706HF-HX014.png',
                'price' => 799.96,
            ],
            [
                'name' => 'ASUS TUF F15 506HE-HN397W',
                'desc' => 'Intel Core i7-11800H 16 Go SSD 512 Go 15.6" LED Full HD 144 Hz NVIDIA GeForce RTX 3050 Ti 4 Go Wi-Fi 6/Bluetooth Webcam Windows 11 Famille',
                'pic' => 'ASUS TUF F15 506HE-HN397W.png',
                'price' => 999.95,
            ],
            [
                'name' => 'ASUS ZenBook Pro 14 Duo UX8402VV-P1036X',
                'desc' => 'Intel Core i9-13900H 32 Go SSD 1 To 14.5" OLED Tactile 2.8K 120 Hz NVIDIA GeForce RTX 4060 8 Go DLSS 3 Wi-Fi 6E/Bluetooth Webcam Windows 11 Professionnel',
                'pic' => 'ASUS ZenBook Pro 14 Duo UX8402VV-P1036X.png',
                'price' => 2999.99,
            ],
            [
                'name' => 'ASUS Zenbook Pro 14 OLED UX6404VI-P1137W',
                'desc' => 'Intel Core i9-13900H 48 Go SSD 1 To 14.5" OLED 2.8K 120 Hz NVIDIA GeForce RTX 4070 8 Go DLSS 3 Wi-Fi 6E/Bluetooth Webcam Windows 11 Famille',
                'pic' => ' ASUS Zenbook Pro 14 OLED UX6404VI-P1137W.png',
                'price' => 2999.99,
            ],
            [
                'name' => 'ASUS ROG STRIX SCAR 18 G834JZ-N6046X',
                'desc' => 'Intel i9-13980HX 32 Go SSD 1 To 18" LED QHD 240 Hz NVIDIA GeForce RTX 4080 12 Go DLSS 3 Wi-Fi 6E/Bluetooth 5.2 Windows 11 Professionnel',
                'pic' => 'ASUS ROG STRIX SCAR 18 G834JZ-N6046X.png',
                'price' => 3449.95,
            ],
        ];
    }
    
    /**
     * return one product from the list
     *
     * @param  string $name
     * @return array
     */
    public function getOneProduct (string $name) {
        $productList = $this->getAllOfProducts();
        foreach ($productList as $product) {
            if ($product['name'] == $name) {
                return $product;
            } 
        }
    }
        
    /**
     * Analyse the values of array param with the list of products in Cart class. Return
     * element if it's present and adjust the price depending on the quantity
     *
     * @param  array $productsToBuy the array comes froms POST when the Cart is submit
     * @return array
     */
    public function getProductsCart (array $productsToBuy) {

        $productsArray = []; // values of products in Cart

        foreach ($productsToBuy as $key => $value) {

            $parts = explode('_', $key);
            $productName = end($parts);
            $nameOfKey = str_replace(array('_nameProduct', '_quantityProduct', '_uniquePrice'), '', $productName);
            $nameOfProduct = preg_replace('/(_nameProduct|_quantityProduct|_uniquePrice)$/', '', $key);
            
            // // Echo values
            // echo "Clé : $key | Nom du produit : $nameOfProduct | valeur : $value | nom de clé : $nameOfKey".'<br>';
            
            array_push($productsArray, [$nameOfKey => $value]);

        }

        // Browse the table in groups of 3
        for ($i = 0; $i < count($productsArray); $i += 3) {
            if (isset($productsArray[$i]['nameProduct'])) {

                // get infos of product
                $productInfo = $this->getOneProduct($productsArray[$i]['nameProduct']);

                // Verify if the product exist in the class
                if ($productInfo !== null) {
                    if (isset($productsArray[$i + 1]['quantityProduct'])) {
                        $productInfo['quantity'] = floatval($productsArray[$i + 1]['quantityProduct']);
                    }
                    $newProductsArray[] = $productInfo;
                }
            }
        }

        return $newProductsArray;
        
    }

}