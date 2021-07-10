<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Icon -->
    <link rel="icon" type="image/ico" href="assets/logo/logo.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <title>Epic Punjab</title>
</head>

<body>
    <div class="header">
        <?php
       if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
       {
           require "includes/userHeader.php";
       }
       else{
           require "includes/header.php";
       }
       ?>
    </div>
    <div class="content">
        <div class="container-fluid">
        <!--Heading Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="text-primary text-center p-2 white">Punjab,India</h1>
                </div>
            </div>
            <!--Content Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <span>Country</span>
                                <p>India</p>
                            </div>
                            <div class="row">
                                <span>Largest city</span>
                                <p>Ludhiana</p>
                            </div>
                            <div class="row">
                                <span>Language spoken</span>
                                <p>Punjabi</p>
                            </div>
                            <div class="row">
                                <span>Literacy</span>
                                <p>76.68%</p>
                            </div>
                            <div class="row">
                                <span>Area</span>
                                <p class="d-flex align-items-start">50,362km<sup>2</sup></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <span>Capital</span>
                                <p>Chandigarh</p>
                            </div>
                            <div class="row">
                                <span>Founded</span>
                                <p>1 November 1966(reorganised) </p>
                            </div>
                            <div class="row">
                                <span>Chief Minister</span>
                                <p>Captain Amrinder Singh</p>
                            </div>
                            <div class="row">
                                <span>Governor</span>
                                <p>Kaptan Singh Solanki</p>
                            </div>
                            <div class="row">
                                <span>Population</span>
                                <p>27.98 million (2012)</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--Content Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="text-primary text-center p-1 ">
                            <h1>Points of interest</h1>
                        </div>
                        <div class="card-body">
                        <span>Harmandir Sahib, Jallianwala Bagh, Durgiana Temple, 
                    Akal Takht, Summer Palace of Maharaja Ranjit Singh</span>
                
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                    <div class="text-primary text-center p-1">
                            <h1>Destinations</h1>
                        </div>
                        
                        <div class="card-body">
                        <span>Ludhiana, 
                    Amritsar, Jalandhar, Patiala, Ajitgarh</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--Content Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                       <div class="block">
                        <p><b>Punjab</b>, also spelt <b>Panjab</b>, is a state in the northwest of the 
                Republic of India, forming part of the larger Punjab region.The state is 
                bordered by the Indian states of Himachal Pradesh to the east, Haryana to the 
                south and southeast, Rajasthan to the southwest, and the Pakistani province of 
                Punjab to the west. To the north it is bounded by the Indian state of Jammu and 
                Kashmir. The state capital is located in Chandigarh, a Union Territory and also 
                the capital of the neighbouring state of Haryana.
                    </p>
                </div>
                        
                    </div>
                </div>
            </div>
            <!--End of Content Row -->
            <!--Heading Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="white p-2 text-primary text-center">Map of Punjab, India</h1>
                </div>
            </div>
            <!-- End Of Heading Row -->
            <!--Content Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="img-block d-flex align-items-center justify-content-center">
                        <img class="mt-3 mb-3" src="assets/images/punjabmap.jpg" alt="Punjab Map" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="card mt-3">
                         <div class="block">
                             <p>
                             After the partition of India in 1947, the Punjab province of British India was divided between India and Pakistan. The Indian Punjab was divided in 1966 with the formation of the new states of Haryana and Himachal Pradesh alongside the current state of Punjab. Punjab is the only state in India with a majority Sikh population. The term Punjab comprises two words: "punj meaning five and ab meaning water, thus the land of five rivers." The Greeks referred to Punjab as Pentapotamia, an inland delta of five converging rivers. In Avesta, the sacred text of Zoroastrians, the Punjab region is associated with the ancient hapta hindu or Sapta Sindhu, the Land of Seven Rivers. Historically, the Punjab region has been the gateway to the Indian Subcontinent for most foreign invaders.
                             </p>
                         </div>
                     </div>
                </div>
            </div>
            <!--End of Content Row -->
            <!--Heading Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="white p-2 text-primary text-center">Industry in Punjab</h1>
                </div>
            </div>
            <!--End of Heading Row -->
            <!--Content Row-->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="block">
                            <p>
                        Agriculture is the largest industry in Punjab. Other major industries include the manufacturing of scientific instruments, agricultural goods, electrical goods, financial services, machine tools, textiles, sewing machines, sports goods, starch, tourism, fertilisers, bicycles, garments, and the processing of pine oil and sugar. Punjab also has the largest number of steel rolling mill plants in India, which are located in "Steel Town"—Mandi Gobindgarh in the Fatehgarh Sahib district.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Content Row -->
            <!--Heading Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="white p-2 text-center text-primary">Etymology</h1>
                </div>
            </div>
            <!--End of Heading Row -->
            <!--Content Row-->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="block">
                            <p>
                            The name of the region is a compound of two Persian words Panj (five) and ab (water) and was introduced to the region by the Turko-Persian conquerors of India and more formally popularised during the Mughal Empire. Punjab literally means "(The Land of) Five Waters" referring to the following rivers: the Jhelum, Chenab, Ravi, Sutlej, and Beas. All are tributaries of the Indus River, the Chenab being the largest.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Content Row -->
            <!--Heading Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="white text-primary text-center p-2">
                         Climate
                    </h1>
                </div>
            </div>
            <!--End of Heading Row -->
            <!--Content Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="img-block d-flex align-items-center justify-content-center">
                        <img class="mt-3 mb-3" src="assets/images/Punjabregion.png" alt="Punjab Climate" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="card mt-3">
                         <div class="block">
                             <p>
                             The climate is a factor contributing to the economy of the Punjab. It is not uniform over the whole region, the sections adjacent to the Himalayas receiving heavier rainfall than those at a distance. There are three main seasons and two transitional periods. During the Hot Season, from about mid April to the end of June, the temperature may reach 49˚C. The Monsoon Season, from July to September, is a period of heavy rainfall, providing water for crops in addition to the supply from canals and irrigation systems. The transitional period after the monsoon is cool and mild, leading to the Winter Season, when the temperature in January falls to 5˚C at night and 12˚C by day. During the transitional period from Winter to the Hot Season sudden hailstorms and heavy showers may occur, causing damage to crops.
                             </p>
                         </div>
                     </div>
                </div>
            </div>
            <!--End of Content Row -->
            <!--Heading Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="white p-2 text-primary text-center">Economy</h1>
                </div>
            </div>
            <!-- End Of Heading Row -->
            <!--Content Row-->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="block">
                            <p>
                            Punjab is one of the most fertile regions in India. The region is ideal for wheat-growing. Rice, sugar cane, fruits and vegetables are also grown Indian Punjab is called the "Granary of India" or "Indias bread-basket". It produces 10.26% of Indias cotton, 19.5% of Indias wheat, and 11% of Indias rice. The Firozpur and Fazilka Districts are the largest producers of wheat and rice in the state. In worldwide terms, Indian Punjab produces 2% of the worlds cotton, 2% of its wheat and 1% of its rice. The largest cultivated crop is wheat. Other important crops are rice, cotton, sugarcane, pearl millet, maize, barley and fruit. Rice and wheat are doublecropped in Punjab with rice stalks being burned off over millions of acres prior to the planting of wheat. This widespread practice is polluting and wasteful. In Punjab the consumption of fertiliser per hectare is 223.46 kg as compared to 90 kg nationally. The state has been awarded the National Productivity Award for agriculture extension services for ten years from 1991–92 to 1998–99 and from 2001 to 2003–04. In recent years a drop in productivity has been observed mainly due to falling fertility of the soil. This is believed to be due to excessive use of fertilisers and pesticides over the years. Another worry is the rapidly falling water table on which almost 90% of the agriculture depends; alarming drops have been witnessed in recent years. By some estimates, groundwater is falling by a meter or more per year.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Content Row -->
            <!--Heading Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="white text-primary text-center p-2">
                         Geography
                    </h1>
                </div>
            </div>
            <!--End of Heading Row -->
            <!--Content Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="img-block d-flex align-items-center justify-content-center">
                        <img class="mt-3 mb-3" src="assets/images/punjab.jpg" alt="Punjab" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="card mt-3">
                         <div class="block">
                             <p>
                             Punjab is in northwestern India and has an area of 50,362 square kilometres (19,445 sq mi). It extends from the latitudes 29.30° North to 32.32° North and longitudes 73.55° East to 76.50° East. It is bounded on the west by Pakistan, on the north by Jammu and Kashmir, on the northeast by Himachal Pradesh and on the south by Haryana and Rajasthan.
                             </p>
                         </div>
                     </div>
                </div>
            </div>
            <!--End of Content Row -->
            <!--Content Row -->
            <div class="row row-reverse">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card mt-3">
                         <div class="block">
                             <p>
                             Most of the Punjab lies in a fertile, alluvial plain with many rivers and an extensive irrigation canal system. A belt of undulating hills extends along the northeastern part of the state at the foot of the Himalayas. Its average elevation is 300 metres (980 ft) above sea level, with a range from 180 metres (590 ft) in the southwest to more than 500 metres (1,600 ft) around the northeast border. The southwest of the state is semiarid, eventually merging into the Thar Desert. The Shiwalik Hills extend along the northeastern part of the state at the foot of the Himalayas. The soil characteristics are influenced to a limited extent by the topography, vegetation and parent rock. The variation in soil profile characteristics are much more pronounced because of the regional climatic differences. Punjab is divided into three distinct regions on the basis of soil types: southwestern, central, and eastern. Punjab falls under seismic zones II, III, and IV. Zone II is considered a low-damage risk zone; zone III is considered a moderate-damage risk zone; and zone IV is considered a high-damage risk zone.
                             </p>
                         </div>
                     </div>
                    
                </div>
                <div class=" col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="img-block d-flex align-items-center justify-content-center">
                        <img class="mt-3 mb-3" src="assets/images/punjab_farmers.jpg" alt="Farmers of Punjab" />
                    </div>
                </div>
            </div>
            <!--End of Content Row -->
            <!--Heading Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="white text-primary text-center p-2">
                         Tourism
                    </h1>
                </div>
            </div>
            <!--End of Heading Row -->
            <!--Content Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="img-block d-flex align-items-center justify-content-center">
                        <img class="mt-3 mb-3" src="assets/images/goldentemple.jpg" alt="Golden Temple" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="card mt-3">
                         <div class="block">
                             <p>
                             Tourism in Indian Punjab centres around the historic palaces, battle sites, and the great Sikh architecture of the state and the surrounding region. Examples include various sites of the Indus Valley Civilization, the ancient fort of Bathinda, the architectural monuments of Kapurthala, Patiala, and Chandigarh, the modern capital designed by Le Corbusier. The Golden Temple in Amritsar is one of the major tourist destinations of Punjab and indeed India, attracting more visitors than the Taj Mahal, Lonely Planet Bluelist 2008 has voted the Harmandir Sahib as one of the world’s best spiritual sites. Moreover, there is a rapidly expanding array of international hotels in the holy city that can be booked for overnight stays. Another main tourist destination is religious and historic city of Sri Anandpur Sahib where large number of tourists come to see the Virasat-e-Khalsa (Khalsa Heritage Memorial Complex) and also take part in Hola Mohalla festival. Kila Raipur Sports Festival is also popular tourist attraction in Kila Raipur (near Ludhiana (Shahpur kandi fort) and (Ranjit sagar lake) (Muktsar Temple) also take part in Pathankot.
                             </p>
                         </div>
                     </div>
                </div>
            </div>
            <!--End of Content Row -->
            <!--Heading Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="white text-primary text-center p-2">
                         Cuisine
                    </h1>
                </div>
            </div>
            <!--End of Heading Row -->
            <!--Content Row -->
            <div class="row row-reverse">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card mt-3">
                         <div class="block">
                             <p>
                             Punjabi cuisine is associated with food from the Punjab region of India and Pakistan. The cuisine has a rich tradition of tandoori cooking. Punjabi cuisine also has been influenced by Mughlai cuisine, a characteristic also featured in the cuisine of Kashmir. Punjab is a major producer of wheat, rice and dairy products which form the staple diet of Punjabi people. The region has one of the highest capita usage of dairy products in both India and Pakistan, and therefore, dairy products form an important component of Punjabi diet. Roti and paratha also form part of the Punjabi staple diet. One of the main features of Punjabi cuisine is its diverse range of dishes. Home cooked and restaurant cuisine sometimes vary in taste. Restaurant style uses large amounts of ghee. Some food items are eaten on a daily basis while some delicacies are cooked only on special occasions.
                             </p>
                         </div>
                     </div>
                    
                </div>
                <div class=" col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="img-block d-flex align-items-center justify-content-center">
                        <img class="mt-3 mb-3" src="assets/images/cuisine.jpg" alt="Cuisines of Punjab" />
                    </div>
                </div>
            </div>
            <!--End of Content Row -->
            <!--Heading Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="white text-primary text-center p-2">
                         Festivals
                    </h1>
                </div>
            </div>
            <!--End of Heading Row -->
            <!--Content Row -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="img-block d-flex align-items-center justify-content-center">
                        <img class="mt-3 mb-3" src="assets/images/lohri-festival.jpg" alt="Punjab Festivals" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="card mt-3">
                         <div class="block">
                             <p>
                             Punjabis celebrate a number of festivals which have taken a semi secular meaning and are regarded as cultural festivals by people of all religions. Some of the festivals are Bandi Chhor Divas(Diwali), Mela Maghi, Hola Mohalla, Rakhri, Vaisakhi, Lohri, Teeyan and Basant.
                             </p>
                         </div>
                     </div>
                </div>
            </div>
            <!--End of Content Row -->
            
        </div>
    </div>
    <script src="assets/scripts/jquery.js"></script>
    <script src="assets/scripts/main.js"></script>
    <script>
        var active_link = document.getElementById("home_link");
        active_link.classList.add("active-sidebar-link");
    </script>
</body>

</html>