-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 08:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `our_ayurved`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('umeshkumar', 'uk123456');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `your_name` varchar(30) NOT NULL,
  `your_email` varchar(60) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`your_name`, `your_email`, `subject`, `message`) VALUES
('Rajkumar', 'raj@gmail.in', 'To add some more medicines.', 'To add.......................'),
('Rohit Kumar', 'rohit@gmail.in', 'To add some more medicines. ', 'To add some more medicines. '),
('Shiv Kumar', 'shiv1@gmail.in', 'To add some more medicines. ', 'Add more'),
('Umesh Kumar', 'umesh@gmail.co', 'To add some more medicines.', 'To add some more medicines.');

-- --------------------------------------------------------

--
-- Table structure for table `herb`
--

CREATE TABLE `herb` (
  `herb_id` int(20) NOT NULL,
  `herb_name` varchar(30) NOT NULL,
  `diseases_name` varchar(100) NOT NULL,
  `herb_description` longtext NOT NULL,
  `herb_image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `herb`
--

INSERT INTO `herb` (`herb_id`, `herb_name`, `diseases_name`, `herb_description`, `herb_image`) VALUES
(1, 'Ashwagandha', 'Calm the brain, reduce swelling, lower blood pressure ', 'Ashwagandha may be effective for reducing stress and anxiety symptoms .However, more research is needed to form a consequences on appropriate forms and dosing to address stress and stress-related disorders.', 'Ashwagandha.jpg'),
(2, 'Triphala', 'Protest against certain cancer and other chronic diseases like diabetes, heart diseases etc..', 'Tribhala is a powerful herbal remedy that consist of Haritaki, Bibhitaki and amla. It is used in traditional Ayurvedic medicine to prevent disease and treat a number of symptoms, including constipation and inflammation.', 'Triphala.jpg'),
(3, 'Brahmi', ' Improving memory power, reducing anxity, reduce ADHD symptoms', 'Brahmi has been used in Ayurveda to support proper function of nervous system. It is used as memory enhancer, aphrodisiac, and health tonic.', 'Brahmi.jpg'),
(4, 'Cumin', 'Promotes Digestion, reduce body fat, cough, cold and bronchitis', 'Cumin aids digestion by increasing the activity of digestive proteins. It may also reduce symptoms of irritable bowel syndrome.', 'Cumin.jpg'),
(5, 'Cardamom', 'Protect from chronic diseases (fever,cough etc...), Cancer fighting, Ulcers', 'Cardamom may help lower blood pressure, most likely due to its antioxidant and diuretic properties.', 'Cardamom.jpg'),
(6, 'Boswellia', 'Diabetes, Joint pain, Cluster headache, Asthma, Crohn\'s disease', ' Boswellia is an Ayurvedic product, it can be an effective painkiller and may prevent the loss of cartilage.It may even be useful in treating certain cancers, such as leukemia and breast cancer.', 'Boswellia.jpg'),
(7, 'Gotu Kola', 'Prevent anxiety, asthma, depression, diabetes, diarrhea, fatigue, indigestion, and stomach ulcers.', 'Gotu kola is also known as marsh penny and Indian pennywort. In traditional Chinese medicine, it is referred to as ji xue sao and, in Ayurvedic medicine, as brahmi.', 'Gotu Kola.jpg'),
(8, 'Licorice root', 'Digestive problems, menopausal symptoms, cough, and bacterial and viral infections.', 'Licorice is an Ayurvedic herb, it is an effective and potent medicinal herb. Licorice root is aromatic and is used as a flavoring agent in tea and other beverages.', 'Licorice root.jpg'),
(9, 'Manjistha', ' Cardiovascular Disorders, Treating Acne, Treating Acne, Anticancer. ', 'Manjistha is an Ayurvedic herb, it is branched climber that has bristles. The stem is slender and four angled. The flowers are very small, greenish white and arranged in a branched cluster.', 'Manjistha.jpg'),
(10, 'Shatavari', 'Bacterial and fungal infections, oedema, infertility, depression and cancer.\r\n', 'Shatavari is an Ayurvedic herb. It is a member of the asparagus family. It’s also an adaptogenic herb. Adaptogenic herbs are said to help your body cope with physical and emotional stress.', 'Manjistha.jpg'),
(11, 'Haritaki', 'Cough, constipation, gas, indigestion, detoxification, weight loss, skin disease, metabolism, immuni', 'Haritaki is an ayurvedic fruit that is extensively used for a wide range of traditional remedies. Cultivated from the seeds of Terminalia chebula tree.', 'Haritaki.jpg'),
(12, 'Guduchi', 'Ability to balance blood sugar, Relieve fever, Promote joint health. Reduce stress,Protect the kidne', 'Guduchi has long been revered as a powerful healing herb in the Ayurvedic tradition. Like a trustworthy friend, it is dependable and consistent, ready to assist with a variety of physical woes.', 'Guduchi.jpg'),
(13, 'Aloe Vera', 'Eye irritations, Gum Infections, Lung congestion, Heals skin problems.', 'Aloe vera is an Ayurveda herb which keeps a woman always youthful. It is a rejuvenating herb, part of a special class of Ayurvedic herbs known as rasayana.', 'Aloe Vera.jpg'),
(14, 'Punarnava', 'Anemia, Liver Diseases, Wounds. ', 'Punarnava, a potent ayurvedic has immense health benefits and has been in use since ancient times in treating a host of health anomalies. ', 'Punarnava.jpg'),
(15, 'Vasaka', 'Breathing trouble, cough, and cold, nasal congestion, sore throat, asthma, bronchitis.', 'Vasaka (Malabar Nut) is an ayurvedic herb that grows in the Sub-Himalayan region, It helps a person breathe easier and is especially beneficial for those experiencing asthma and bronchitis.', 'Vasaka.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_image` varchar(30) NOT NULL,
  `diseases_name` varchar(100) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_composition` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `diseases_name`, `product_description`, `product_composition`) VALUES
(1, 'Fumitory', 'fumitory.jpg', 'Disorder of hepatobiliary tract, diabetes, lowering glucose level.', 'Fumitory, also known as ', 'We are working on it.'),
(4, 'Ashwagandha', 'ashwagandha1.jpg', 'Stress, calm brain, reduce swelling, lower blood pressure and alter immune system.', 'Ashwagandha is an evergreen shrub that grows in Ashia and Africa.', 'It contain many chemicals.'),
(5, 'Astragalus', 'astragalus.jpg', 'Improve Immune System.', 'Mostly this remedy is used to improve immune system.', 'Polysaccharides, saponins, flavonoids, iso-flavonoids, sterols, amino acids etc.'),
(6, 'Bloodroot', 'bloodroot.jpg', 'Ulcers, skin conditions, red eyes', 'The Bloodroot entered 19th century medicine as caustic topical treatment for skin cancers.', 'We are working on it.'),
(7, 'Gotu Kola', 'gotu_kola.jpg', 'Wound healing and skin problems like Psiriasis.', 'Gotu Kola\'s scientific name is Centella Aciatica.', 'Proteins, the B vitamins, vitamin C, minerals, irons, calcium etc.'),
(8, 'Valeriana', 'valeriana.jpg', 'Feeling tired, an upset stomach.', 'This medicine is also very useful.', 'Valerenic acid, valepotriates, amino acids and lignans'),
(9, 'Vinpocetine', 'vinpocetine.jpg', 'Menopause, tiredness, motion sickness, stomach ulcers.', 'Vinpocetine is a semi-synthetic derivative of vincamine, an alkaloid derived from Vinca minor L.', 'Ethyl Apovincaminate, Common periwinkle vinpocetine, lesser periwinkle extract, vinca minor extract.'),
(10, 'Raspberry', 'raspberry.jpg', 'Decrease Cholesterol levels and swelling, stomach problems etc.', 'Red Raspberry fruit and leaf have been used as medicine for centuries.', 'We are working on it.'),
(11, 'Quercetin', 'quercetin.jpg', 'Lower blood pressure, cancer, prostate problems.', 'Quercetin remedy is used for many different-different disease.', 'We are collecting data.'),
(12, 'Alfalfa', 'alfalfa.jpg', 'Source of Vitamins and minerals', 'Not more but about Alfalfa - This product is not like a medicine, it is an energetic product that contains minerals and vitamins.', ''),
(14, 'Alfa Lipoic Acid', 'alfa lipoic acid.jpg', 'Nerve pain, diabetes, macular degeneration', 'Alfa-Lipoic-Acid is also known as ALA. It is used by some people to help relieve nerve pain.', ''),
(15, 'Brahmi', 'brahmi2.jpg', 'Heal wounds', 'Brahmi is mostly used in heal wounds. If taking this product with other drugs may cause some little liver problem so take care and consult a doctor.', 'Bacopa monnieri or Gotu-Kola, Sesame oil, coconut oil'),
(16, 'Chickweed', 'chickweed.jpg', 'Asthma, blood disorders, conjunctivitis, constipation etc. ', 'Chickweed also known as mouse-ear, satin-flower, star-weed, starwort, etc.', 'Phytosterols, tocopherols, triterpene, saponins, vitamin C etc.'),
(17, 'Delcynise', 'delcynise.jpg', '', '', 'Boswellin, Curcuminoids, Devils claw extract.'),
(18, 'Dolomite', 'dolomite.jpg', 'Lack of calcium and minerals mostly in animals.', 'Dolomite is a form of limestone, rich in approximately equal part of magnesium carbonite and calcium carbonite.', 'CaO, MgO, CO2, Trace minerals- SiO2 etc.'),
(19, 'HK Vitals FishOil', 'fish_oil.jpg', 'Heart problems like Coronary artery disease, to control triglycerides levels.', '', 'Bioavailable fish oil, EPA, DHA etc.'),
(20, 'Horsetail', 'horsetail.jpg', 'Urological disorders, Tuberculosis, wound healing', 'Horsetail may exert slight diuretic activity, although studies are needed to prove it.', ''),
(21, 'Licorice', 'licorice2.jpg', 'Ulcers, Heart burn etc.', 'Some people believe licorice will help protect your liver or protect you from cancer.  ', 'Sugar, Starch, bitters, resign, essential oils, tannins, proteins, etc. '),
(22, 'Milk Thistle', 'milk_thistle.jpg', 'Lower blood sugar, to help liver problems', 'Milk Thistle is used by some people to help with liver problems. And other use that to help prevent harm to the liver.', ''),
(23, 'O4u Sandalwood', 'o4u_sandalwood.jpg', 'Fragrance enhancer, Urinary Antiseptic properties', 'The oil has been used in the traditional ayurvedic medicinal system as a diuretic and mild stimulant and for smoothing the skin. ', ''),
(24, 'Probiotics', 'probiotics.jpg', 'Irritable bowel syndrome, high blood pressure, sinus infection.', 'Probiotics are kind of bacteria that normally live in the stomach and gut of healthy people.', 'Micro-organism like Lactobacillus and Bifidobacterium.'),
(29, 'Tulsi kadha', 'tulsi_kadha.jpg', 'Fever, relieving cough and cold symptoms.', 'A natural immunity booster and can help relieve symptoms of a viral fever such as sore throat and cough.', 'Tulsi, lemongrass, ginger '),
(30, 'Rasraj ras', 'rasraj_ras.jpg', 'Paralysis, hemiplegia, locked jaw, facial palsy, hearing defects, dizziness', 'Ayurvedic rasraj ras is a unique combination of a dozen of herbal and metallic ingredients, and the result of combining so many powerful substances can be clearly seen on patients of paralysis', ' Ras Sindoor, Makoi ras, Abhrak Bhasma, Swarna Bhasma, Lauha Bhasma, Raupya Bhasma, Bang Bhasma, Ashwagandha, Laung, Javitri, Jaiphal, Kakoli, and Ghrit kumari'),
(31, 'Vishamusthi Vati', 'vishamusthi_vati.jpg', 'Backache', 'Vishamushti Vati is an ayurvedic medicine used in treating backache. It is an excellent analgesic and anti-inflammatory agent. The best herbal remedy for joint diseases like frozen shoulder, joint pain, arthritis. It is mainly indicated in lumbago and abdominal pain.', 'Rasa sindura (Red sulfide of mercury), Lauh bhasma (Calcined iron), Jaiphala (Myristica fragrans), Lavang (Syzygium aromatics), Sukshmaila (Elettaria cardamum)'),
(32, 'Divya swasari pravahi', 'divya_swasari.jpg', 'Asthma', 'Divya swasari pravahi activates the cells of the lungs. It alleviates respiratory tract and lung inflammation.', 'Glycyrrhiza Glabra,Solanum  Xanthocarpum'),
(33, 'Divya madhunashini vati', 'divya_madhunashini.png', 'Diabities', 'Divya madhunashini vati extra power solves complications from diabetes. Over time diabetes affects vision, immunity, strength in limbs and leads to skin disorders and weight problems.', 'Mulethi (Glycyrrhiza glabra),  Tulsi Desi (Ocimum sanctum),  Lavang (Syzygium aromaticum)'),
(34, 'Divya Avipattikar Churan', 'avipattikar_churan.jpg', 'Acidity', 'Avipattikar churna is a very effective cure for acidity, indigestion and constipation. Unhealthy, unbalanced diet and sedentary lifestyle often leads to digestion-related problems.', 'Sounth, Kali,Mirch ,Pippal, Harad ,Baheda, Amla '),
(35, ' Divya Sarvakalp Kwath ', 'sarvakalp_kwath.jpg', 'Jaundice, oedema, swelling of liver ', 'The regular use of this kwath strengthens liver. The contaminated, stale food and drinks like cold drinks, tea and others deposit toxins inside the body, which affects smooth functioning of liver.', ' Punarnava, Bhumi Amla, and Makoy ');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `username`, `password`, `confirm password`) VALUES
('Dev', 'dev@gmail.co', '12341234', '12341234'),
('Jeet', 'jeet@gmail.in', '12345678', '12345678'),
('Mohan', 'mohan@gmail.in', '12341234', '12341234'),
('Ram', 'ram@gmail.in', '12345678', '12345678'),
('Ramu', 'ramu@gmail.co', 'asdfasdf', 'asdfasdf'),
('Rohit Kumar', 'rohit@gmail.com', '87654321', '87654321'),
('Rohit', 'rohitkumar@gmail.com', '43214321', '43214321'),
('Shivkant', 'shivkant@gmail.com', '12345678', '12345678'),
('Sohan', 'sohan@gmail.com', '12345678', '12345678'),
('Sonti', 'sonti@mail.com', 'qwertyui', 'qwertyui'),
('Sonu', 'sonu@gmail.com', '12345678', '12345678'),
('Umesh Kumar', 'umesh@gmail.co', '12345678', '12345678'),
('Umesh Kumar', 'umesh@gmail.com', '12345678', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_address` varchar(200) NOT NULL,
  `mobile_number` int(15) NOT NULL,
  `shop_image` varchar(100) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `shop_name`, `shop_address`, `mobile_number`, `shop_image`, `pincode`, `city`, `state`, `country`) VALUES
(11, 'Patanjali Chikitsalaya', 'GMB plaza, Agra Road, Aligarh HO, Aligarh - 202001, Near Hathras bus station', 2147483647, 'patanjali_chik.jpg', '202001', 'Aligarh', 'Uttar Pradesh', 'India'),
(12, 'Arogya Dhaam', 'G/111, Ramghat Rd, Gulzar Nagar, Hem Chand Compound, Aligarh, Uttar Pradesh 202001, India', 2147483647, 'ArogyaDhaam.jpg', '202001', 'Aligarh', 'Uttar Pradesh', 'India'),
(13, 'Aligmedicos Herbal Store', 'Sai ram apartment, Swarn Jayanti nagar, Aligarh HO, Aligarh - 202001, Near Swarn apartment', 2147483647, 'patanjali_kendra.jpg', '202001', 'Aligarh', 'Uttar Pradesh', 'India'),
(14, 'Ayush Ayurved', 'Zambad estste shop no 2, Shahnoor miya dargah road, Roplekar chowk signal, Chetna Nagar, Aurangabad - 431001, Maharashtra, India', 2147483647, 'ayush_ayurved.jpg', '431001', 'Dargah', 'Maharastra', 'India'),
(15, 'Kerala Ayurvedic Store', 'Shop No 117/N/100, Deoki Cinema Road, Kaka Deo, Kanpur - 208025, Near Hanuman Gadi Mandir', 2147483647, 'kerla (1).jpg', '208025', 'Kanpur', 'Uttar Pradesh', 'India'),
(16, 'Gabba Ayurvedic Store', 'Kalka Road, Rajpura ho, Patiala - 140401, Near Over Bridge Punjab', 2147483647, 'gabba.jpg', '140055', 'Patiala', 'Punjab', 'India'),
(17, 'Ayurvedic Hub Store', 'Shop No.15, Saraswati Vasant Sagar, Opp. D Mart, Thakur Village, Kandivali East, Mumbai – 400101', 93727, 'Ayurvedic_hub.jpg', '431001', 'Mumbai', 'Maharastra', 'India'),
(18, 'Shri Ayurvedic Store', '19, Ground Floor, Krishna Market, Jhilmil Colony,Delhi,-110031', 2147483647, 'Shri_ayurved.jpg', '110031', 'Delhi', 'Delhi', 'India'),
(19, 'Swadeshi Ayurvedic Store', 'A-215/C, Main Road, Vaishali Sector 3, Ghaziabad - 201012, Opposite Shopprix Mal', 2147483647, 'swadeshi_Ayurved.jpg', '201012', 'Ghaziabad', 'Uttar Pradesh', 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`your_email`);

--
-- Indexes for table `herb`
--
ALTER TABLE `herb`
  ADD PRIMARY KEY (`herb_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `herb`
--
ALTER TABLE `herb`
  MODIFY `herb_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
