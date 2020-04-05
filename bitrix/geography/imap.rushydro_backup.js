// Инициализация виджета
var initImap1 = function(container, lang){
	var Imap1 = new Class({

		Implements: [Options],

		options: {

			/**
			 * @var {String} Current language
			 */
			lang: 'ru',

			/**
			 * @var {Object} Points params (x, y, type)
			 */
			points: [
				{
			        "coord": [505, 311],
			        "title": {
			            "ru": "Богучанская ГЭС",
			            "en": "Boguchanskaya HPP"
			        },
			        "power": [2997, null],
			        "type": 1,
					"block_id": 1
			    },
			    {
			        "coord": [746, 369],
			        "title": {
			            "ru": "Бурейская ГЭС",
			            "en": "Byreyskaya HPP"
			        },
			        "power": [2010, null],
			        "type": 1,
			        "id": 1,
					"block_id": 2					
			    },
			    {
			        "coord": [189, 172],
			        "title": {
			            "ru": "Каскад Верхневолжских ГЭС",
			            "en": "Cascade of Verkhnevolzhskiye HPPs"
			        },
			        "power": [476.6, null],
			        "type": 1,
			        "id": 2,
					"block_id": 3
			    },
			    {
			        "coord": [598, 257],
			        "title": {
			            "ru": "Каскад Вилюйских ГЭС",
			            "en": "Cascade of Viluysky HPPs"
			        },
			        "power": [680, null],
			        "type": 1,
			        "id": 3,
					"block_id": 4
			    },
			    {
			        "coord": [145, 273],
			        "title": {
			            "ru": "Волжская ГЭС",
			            "en": "Volzhskaya HPP"
			        },
			        "power": [2660.5, null],
			        "type": 1,
			        "id": 4,
					"block_id": 5
			    },
			    {
			        "coord": [253, 243],
			        "title": {
			            "ru": "Воткинская ГЭС",
			            "en": "Votkinskaya HPP"
			        },
			        "power": [1020, null],
			        "type": 1,
			        "id": 5,
					"block_id": 6
			    },
				{
			        "coord": [116, 344],
			        "title": {
			            "ru": "Гоцатлинская ГЭС",
			            "en": "Cotsatlinskaya HPP"
			        },
			        "power": [100, null],
			        "type": 1,
					"block_id": 29
			    },
			    {
			        "coord": [126, 337],
			        "title": {
			            "ru": "ГЭС Дагестанского филиала",
			            "en": "Dagestan Branch"
			        },
			        "power": [1785.5, null],
			        "type": 1,
			        "id": 6,
					"block_id": 7
			    },
			    {
			        "coord": [205, 255],
			        "title": {
			            "ru": "Жигулевская ГЭС",
			            "en": "Zhigulevskaya HPP"
			        },
			        "power": [2446, null],
			        "type": 1,
			        "id": 7,
					"block_id": 8
			    },
			    {
			        "coord": [161, 161],
			        "title": {
			            "ru": "Загорская ГАЭС",
			            "en": "Zagorskaya PSHPP"
			        },
			        "power": [1200, null],
			        "type": 1,
			        "id": 8,
					"block_id": 9
			    },
				{
			        "coord": [86, 308],
			        "title": {
			            "ru": "Зарагижская ГЭС",
			            "en": "Zaragizhskaja HPPs"
			        },
			        "power": [30.6, null],
			        "type": 1,
					"block_id": 27
			    },
			    {
			        "coord": [703, 345],
			        "title": {
			            "ru": "Зейская ГЭС",
			            "en": "Zeyskaya HPP"
			        },
			        "power": [1330, null],
			        "type": 1,
			        "id": 10,
					"block_id": 10
			    },
				{
			        "coord": [97, 294],
			        "title": {
			            "ru": "Зеленчукская ГЭС-ГАЭС",
			            "en": "Zelenchukskaya PSHPP"
			        },
			        "power": [300, null],
			        "type": 1,
					"block_id": 31
			    },
			    {
			        "coord": [100, 316],
			        "title": {
			            "ru": "ГЭС Кабардино-Балкарского филиала",
			            "en": "Kabardino-Balkarian Branch"
			        },
			        "power": [157.5, null],
			        "type": 1,
			        "id": 11,
					"block_id": 11
			    },
			    {
			        "coord": [270, 236],
			        "title": {
			            "ru": "Камская ГЭС",
			            "en": "Kamskaya HPP"
			        },
			        "power": [552, null],
			        "type": 1,
					"block_id": 12
			    },
				/*
			    {
			        "coord": [110, 302],
			        "title": {
			            "ru": "ГЭС Карачаево-Черкесского филиала",
			            "en": "Karachaevo-Cherkessian Branch HPP"
			        },
			        "power": [160.6, null],
			        "type": 1,
					"block_id": 13
			    },
				*/
			    {
			        "coord": [796, 204],
			        "title": {
			            "ru": "Колымская ГЭС",
			            "en": "Kolymskaya HPP"
			        },
			        "power": [900, null],
			        "type": 1,
					"block_id": 14
			    },
			    {
			        "coord": [113, 288],
			        "title": {
			            "ru": "Каскад Кубанских ГЭС",
			            "en": "Cascade of Kubanskiye HPPs"
			        },
			        "power": [476.5, null],
			        "type": 1,
					"block_id": 15
			    },
			    {
			        "coord": [199, 210],
			        "title": {
			            "ru": "Нижегородская ГЭС",
			            "en": "Nizhegorodskaya HPP"
			        },
			        "power": [520, null],
			        "type": 1,
					"block_id": 16
			    },
			    {
			        "coord": [411, 338],
			        "title": {
			            "ru": "Новосибирская ГЭС",
			            "en": "Novosibirskaya HPP"
			        },
			        "power": [470, null],
			        "type": 1,
					"block_id": 17
			    },
			    {
			        "coord": [173, 257],
			        "title": {
			            "ru": "Саратовская ГЭС",
			            "en": "Saratovskaya HPP"
			        },
			        "power": [1403, null],
			        "type": 1,
					"block_id": 18
			    },
			    {
			        "coord": [466, 376],
			        "title": {
			            "ru": "Саяно-Шушенский ГЭК",
			            "en": "Sayano-Shushensky Branch"
			        },
			        "power": [6721, null],
			        "type": 1,
					"block_id": 19
			    },
			    {
			        "coord": [56, 349],
			        "title": {
			            "ru": "Севан-Разданский каскад ГЭС",
			            "en": "Sevan-Hrazdan Cascade HPP"
			        },
			        "power": [561.41, null],
			        "type": 1,
					"block_id": 20
			    },
			    {
			        "coord": [113, 323],
			        "title": {
			            "ru": "ГЭС Северо-Осетинского филиала",
			            "en": "HPP of the Northern Ossetian Branch"
			        },
			        "power": [79.5, null],
			        "type": 1,
					"block_id": 21
			    },
			    {
			        "coord": [866, 237],
			        "title": {
			            "ru": "Толмачевские ГЭС",
			            "en": "Tolmachyovskiye HPPs"
			        },
			        "power": [45.2, null],
			        "type": 1,
					"block_id": 22
			    },
			    {
			        "coord": [214, 226],
			        "title": {
			            "ru": "Чебоксарская ГЭС",
			            "en": "Cheboksarskaya HPP"
			        },
			        "power": [1370, null],
			        "type": 1,
					"block_id": 23
			    },
			    {
			        "coord": [888, 244],
			        "title": {
			            "ru": "Верхне-Мутновская ГеоЭС",
			            "en": "Verkhne-Mutnovskaya GeoPP"
			        },
			        "power": [12, null],
			        "type": 2,
					"block_id": 24
			    },
			    {
			        "coord": [886, 258],
			        "title": {
			            "ru": "Мутновская ГеоЭС",
			            "en": "Mutnovskaya GeoPP"
			        },
			        "power": [50, null],
			        "type": 2,
					"block_id": 25
			    },
			    {
			        "coord": [898, 276],
			        "title": {
			            "ru": "Паужетская ГеоЭС",
			            "en": "Pauzhetskaya GeoPP"
			        },
			        "power": [12, 2.5],
			        "type": 2,
					"block_id": 26
			    },
			    /*{
			        "coord": [340, 456],
			        "title": {
			            "ru": "Верхне-Нарынский каскад ГЭС",
			            "en": "Verhne-Narynskye Cascade"
			        },
			        "power": [237.7, null],
			        "type": 3
			    },*/				
				{
			        "coord": [104, 328],
			        "title": {
			            "ru": "Зарамагские ГЭС",
			            "en": "Zaramagsky HPPs"
			        },
			        "power": [15, 342],
			        "type": 3,
			        "id": 9,
					"block_id": 28
			    },			    
			    {
			        "coord": [148, 169],
			        "title": {
			            "ru": "Загорская ГАЭС-2",
			            "en": "Zagorskaya PSHPP"
			        },
			        "power": [840, null],
			        "type": 3,
					"block_id": 30
			    },			    
			    {
			        "coord": [736, 379],
			        "title": {
			            "ru": "Нижне-Бурейская ГЭС",
			            "en": "Nizhne-Bureyskaya HPP"
			        },
			        "power": [320, null],
			        "type": 3,
					"block_id": 32
			    },
			    {
			        "coord": [803, 189],
			        "title": {
			            "ru": "Усть-Среднеканская ГЭС имени А.Ф. Дьякова",
			            "en": "Ust-Srednekanskaya HPP"
			        },
			        "power": [168, 142.5],
			        "type": 3,
					"block_id": 33
			    },
			    {
			        "coord": [761, 445],
			        "title": {
			            "ru": "Дальневосточная энергетическая компания",
			            "en": "Far-Eastern Energy Company"
			        },
			        "power": [null, null],
			        "type": 4,
					"block_id": 34
			    },
			    {
			        "coord": [465, 345],
			        "title": {
			            "ru": "Красноярскэнергосбыт",
			            "en": "Krasnoyarskenergosbyt"
			        },
			        "power": [null, null],
			        "type": 4,
					"block_id": 35
			    },
			    {
			        "coord": [186, 197],
			        "title": {
			            "ru": "Рязанская энергосбытовая компания",
			            "en": "Ryazan retail energy company"
			        },
			        "power": [null, null],
			        "type": 4,
					"block_id": 36
			    },
			    {
			        "coord": [236, 229],
			        "title": {
			            "ru": "Чувашская энергосбытовая компания",
			            "en": "Chuvash retail energy company"
			        },
			        "power": [null, null],
			        "type": 4,
					"block_id": 37
			    },
				{	
					"coord": [707,375],
			        "title": {
			            "ru": "ДРСК",
			            "en": "DRSK"
			        },
			        "power": [null, null],
			        "type": 11,
					"block_id": 38
			    },
			    /*{
			        "coord": [241, 257],
			        "title": {
			            "ru": "Энергетическая сбытовая компания Башкортостана",
			            "en": "Bashkortostan retail energy company"
			        },
			        "power": [null, null],
			        "type": 4
			    },*/
			    {
			        "coord": [780, 342],
			        "title": {
			            "ru": "Амурская ТЭЦ",
			            "en": "Amurskaya CHPP"
			        },
			        "power": [285, null],
			        "type": 5,
					"block_id": 40
			    },
				{
			        "coord": [901, 98],
			        "title": {
			            "ru": "Анадырская ГМТЭЦ",
			            "en": "Anadyrskaya Gas Engine CHPP"
			        },
			        "power": [28.65, null],
			        "type": 5,
					"block_id": 41
			    },
			    {
			        "coord": [891, 87],
			        "title": {
			            "ru": "Анадырская ТЭЦ",
			            "en": "Anadyr CHPP"
			        },
			        "power": [56, null],
			        "type": 5,
					"block_id": 42
			    },
			    {
			        "coord": [764, 431],
			        "title": {
			            "ru": "Артемовская ТЭЦ",
			            "en": "Artyomovskaya CHPP"
			        },
			        "power": [400, null],
			        "type": 5,
					"block_id": 43
			    },
			    {
			        "coord": [715, 385],
			        "title": {
			            "ru": "Благовещенская ТЭЦ",
			            "en": "Blagoveshenskaya CHPP"
			        },
			        "power": [280, null],
			        "type": 5,
					"block_id": 44
			    },
			    {
			        "coord": [762, 459],
			        "title": {
			            "ru": "Владивостокские ТЭЦ",
			            "en": "Vladivostok CHPP"
			        },
			        "power": [497, null],
			        "type": 5,
					"block_id": 45
			    },
			    {
			        "coord": [900, 251],
			        "title": {
			            "ru": "Камчатские ТЭЦ",
			            "en": "Kamchatskiye CHPPs"
			        },
			        "power": [392.2, null],
			        "type": 5,
					"block_id": 46
			    },
			    {
			        "coord": [794, 337],
			        "title": {
			            "ru": "Комсомольские ТЭЦ-1, ТЭЦ-2",
			            "en": "Komsomolskiye CHPPs-1, CHPPs-2"
			        },
			        "power": [222.5, null],
			        "type": 5,
					"block_id": 47
			    },
			    {
			        "coord": [792, 351],
			        "title": {
			            "ru": "Комсомольская ТЭЦ-3",
			            "en": "Komsomolskaya CHPP"
			        },
			        "power": [360, null],
			        "type": 5,
					"block_id": 48
			    },
			    {
			        "coord": [365, 213],
			        "title": {
			            "ru": "Казым <em>(передвижная ЭС)</em>",
			            "en": "Kazym Mobile PP"
			        },
			        "power": [72, null],
			        "type": 5,
					"block_id": 49
			    },
			    {
			        "coord": [388, 173],
			        "title": {
			            "ru": "Лабытнанги <em>(передвижная ЭС)</em>",
			            "en": "Labytnangi Mobile PP"
			        },
			        "power": [66.00, null],
			        "type": 5,
					"block_id": 50
			    },
			    {
			        "coord": [805, 232],
			        "title": {
			            "ru": "Магаданская ТЭЦ",
			            "en": "Magadanskaya CHPP"
			        },
			        "power": [96, null],
			        "type": 5,
					"block_id": 51
			    },
			    {
			        "coord": [612, 264],
			        "title": {
			            "ru": "Мирнинская ГРЭС",
			            "en": "Mirninskaya TPP"
			        },
			        "power": [24, null],
			        "type": 5,
					"block_id": 52
			    },
			    {
			        "coord": [666, 329],
			        "title": {
			            "ru": "Нерюнгринская ГРЭС",
			            "en": "Nerunginskya TPP"
			        },
			        "power": [570, null],
			        "type": 5,
					"block_id": 53
			    },
			    {
			        "coord": [796, 320],
			        "title": {
			            "ru": "Николаевская ТЭЦ",
			            "en": "Nikolaevskaya CHPP"
			        },
			        "power": [130.6, null],
			        "type": 5,
					"block_id": 54
			    },
			    {
			        "coord": [781, 439],
			        "title": {
			            "ru": "Партизанская ГРЭС",
			            "en": "Partizanskaya TPP"
			        },
			        "power": [203, null],
			        "type": 5,
					"block_id": 55
			    },
			    {
			        "coord": [776, 412],
			        "title": {
			            "ru": "Приморская ГРЭС",
			            "en": "Primorskaya TPP"
			        },
			        "power": [1467, null],
			        "type": 5,
					"block_id": 56
			    },
			    {
			        "coord": [728, 391],
			        "title": {
			            "ru": "Райчихинская ГРЭС",
			            "en": "Raychikhiskaya TPP"
			        },
			        "power": [102, null],
			        "type": 5,
					"block_id": 57
			    },
			    {
			        "coord": [828, 351],
			        "title": {
			            "ru": "Сахалинская ГРЭС",
			            "en": "Sakhalinskaya TPP"
			        },
			        "power": [84, null],
			        "type": 5,
					"block_id": 58
			    },
			    {
			        "coord": [419, 179],
			        "title": {
			            "ru": "Уренгой <em>(передвижная ЭС)</em>",
			            "en": "Urengoy Mobile PP"
			        },
			        "power": [72, null],
			        "type": 5,
					"block_id": 59
			    },
			    {
			        "coord": [779, 391],
			        "title": {
			            "ru": "Хабаровские ТЭЦ",
			            "en": "Khabarovskiye CHPPs"
			        },
			        "power": [1155, null],
			        "type": 5,
					"block_id": 60
			    },
				{
			        "coord": [656, 315],
			        "title": {
			            "ru": "Чульманская ТЭЦ",
			            "en": "Chulmanskaya CHPP"
			        },
			        "power": [48, null],
			        "type": 5,
					"block_id": 61
			    },
				{
			        "coord": [897, 64],
			        "title": {
			            "ru": "Эгвекинотская ГРЭС-1",
			            "en": "Egvenkinotskaya TPP"
			        },
			        "power": [34, null],
			        "type": 5,
					"block_id": 62
			    },
				{
			        "coord": [832, 394],
			        "title": {
			            "ru": "Южно-Сахалинская ТЭЦ-1",
			            "en": "Yuzhno-Sakhalinskaya CHPP-1"
			        },
			        "power": [455.24, null],
			        "type": 5,
					"block_id": 63
			    },
				{
			        "coord": [685, 237],
			        "title": {
			            "ru": "Якутская ГРЭС",
			            "en": "Yakutskaya TPP"
			        },
			        "power": [368, null],
			        "type": 5,
					"block_id": 64
			    },
				{
			        "coord": [749, 198],
			        "title": {
			            "ru": "Аркагалинская ГРЭС",
			            "en": "Arkagalinskaya TPP"
			        },
			        "power": [224, null],
			        "type": 5,
					"block_id": 65
			    },
				{
					"coord": [807, 377],
			        "title": {
			            "ru": "Майская ГРЭС",
			            "en": "Maya TPP"
			        },
			        "power": [78.2, null],
			        "type": 5,
					"block_id": 66
			    },
				{
			        "coord": [826, 69],
			        "title": {
			            "ru": "Чаунская ТЭЦ",
			            "en": "Chaunskaya CHPP"
			        },
			        "power": [34.5, null],
			        "type": 5,
					"block_id": 67
			    },
				{
			        "coord": [696, 237],
			        "title": {
			            "ru": "Якутская ТЭЦ",
			            "en": "Yakutskaya CHPP"
			        },
			        "power": [12, null],
			        "type": 5,
					"block_id": 68
			    },
				
			    {
			        "coord": [776, 453],
			        "title": {
			            "ru": "ТЭЦ Восточная",
			            "en": "Vostochnaya TPP"
			        },
			        "power": [139.5, null],
			        "type": 6,
					"block_id": 69
			    },
				{
			        "coord": [794, 372],
			        "title": {
			            "ru": "ТЭЦ Советская Гавань",
			            "en": "Sovgavanskaya CHPP"
			        },
			        "power": [120, null],
			        "type": 6,
					"block_id": 70
			    },
			    {
			        "coord": [823, 383],
			        "title": {
			            "ru": "Сахалинская ГРЭС-2",
			            "en": "Sakhalinskaya TPP"
			        },
			        "power": [120, null],
			        "type": 6,
					"block_id": 71
			    },
			    {
			        "coord": [707, 237],
			        "title": {
			            "ru": "Якутская ГРЭС-2",
			            "en": "Yakutskaya TPP"
			        },
			        "power": [193, null],
			        "type": 6,
					"block_id": 72
			    },
			    {
			        "coord": [265, 53],
			        "title": {
			            "ru": "Кислогубская ПЭС",
			            "en": "Kislogubskaya Tidal PP"
			        },
			        "power": [1.7, null],
			        "type": 7,
					"block_id": 73
			    },
				
			    {
			        "coord": [894, 228],
			        "title": {
			            "ru": "ВЭС в п. Усть-Камчатск",
			            "en": "Ust-Kamchatsk Wind PP"
			        },
			        "power": [1.1, null],
			        "type": 8,
					"block_id": 74
			    },
				{
			        "coord": [910, 228],
			        "title": {
			            "ru": "ВДК в п. Никольское",
			            "en": "Nikolskoe Wind PP"
			        },
			        "power": [0.55, null],
			        "type": 8,
					"block_id": 75
			    },
				{
			        "coord": [843, 384],
			        "title": {
			            "ru": "ВДК в с. Новиково",
			            "en": "Novikovo Wind PP"
			        },
			        "power": [0.55, null],
			        "type": 8,
					"block_id": 76
			    },
				{
			        "coord": [698, 192],
			        "title": {
			            "ru": "Батагайская СЭС",
			            "en": "Solar power"
			        },
			        "power": [1, null],
			        "type": 10,
					"block_id": 77
			    },
				
			    {
			        "coord": [156, 181],
			        "title": {
			            "ru": "«Мособлгидропроект»",
			            "en": "Mosoblhydroproject"
			        },
			        "power": [null, null],
			        "type": 9,
					"block_id": 78
			    },
			    {
			        "coord": [167, 126],
			        "title": {
			            "ru": "ВНИИГ им. Б.Е. Веденеева",
			            "en": "Vedeneyev VNIIG"
			        },
			        "power": [null, null],
			        "type": 9,
					"block_id": 79
			    },
			    {
			        "coord": [167, 190],
			        "title": {
			            "ru": "Институт «Гидропроект» им. С.Я. Жука",
			            "en": "Hydroproject institute"
			        },
			        "power": [null, null],
			        "type": 9,
					"block_id": 80
			    },
			    {
			        "coord": [168, 112],
			        "title": {
			            "ru": "Институт «Ленгидропроект»",
			            "en": "Lenhydroproject"
			        },
			        "power": [null, null],
			        "type": 9,
					"block_id": 81
			    },
			    {	
					"coord": [170, 176],
			        "title": {
			            "ru": "НИИЭС",
			            "en": "NIIES"
			        },
			        "power": [null, null],
			        "type": 9,
					"block_id": 82
			    }
				
			    
			],

			/**
			 * @var {Object} Plant types definition
			 */
			types: {},
			filter: [
				{
					"type": 1,
			        "title": {
			            "ru": "Действующие ГЭС",
			            "en": "Operating HPPs"
			        },
					"haspower": 1
				},
				{
					"type": 2,
			        "title": {
			            "ru": "ГеоЭС",
			            "en": "GeoPPs"
			        },
					"haspower": 1
				},
				{
					"type": 3,
			        "title": {
			            "ru": "Строящиеся ГЭС",
			            "en": "HPPs under construction"
			        },
					"haspower": 1
				},
				{
					"type": 4,
			        "title": {
			            "ru": "Сбытовые компании",
			            "en": "Retail companies"
			        },
					"haspower": 0
				},
				{
					"type": 5,
			        "title": {
			            "ru": "Тепловые станции",
			            "en": "Thermal PPs"
			        },
					"haspower": 1
				},
				{
					"type": 6,
			        "title": {
			            "ru": "Строящиеся ТЭЦ",
			            "en": "Thermal PPs under construction"
			        },
					"haspower": 1
				},
				{
					"type": 7,
			        "title": {
			            "ru": "Приливная ЭС",
			            "en": "Tidal PP"
			        },
					"haspower": 1
				},
				{
					"type": 8,
			        "title": {
			            "ru": "Ветряные ЭС",
			            "en": "Wind PP"
			        },
					"haspower": 1
				},
				{
					"type": 9,
			        "title": {
			            "ru": "Научно-исследовательские и&nbsp;проектные организации",
			            "en": "Research and design organizations"
			        },
					"haspower": 0
				},
				{
					"type": 10,
			        "title": {
			            "ru": "Солнечная ЭС",
			            "en": "Solar Electric"
			        },
					"haspower": 1
				},				
				{
					"type": 11,
			        "title": {
			            "ru": "Электросетевые компании",
			            "en": "Electrocompany"
			        },
					"haspower": 0
				}
				
			]
		},

		initialize: function(container, options)
		{
			this.setOptions(options);

			this.container = $(container);
			this.pointContainer = this.container.find('.w-imap-points');
			this.points = [];
			this.filter = [];

			if (options.lang == 'ru') {
				$('.w-imap-line-bottom .w-imap-filter-title').text('Фильтрация объектов на карте');
				$('.w-imap-line-top').text('География присутствия компании');
				$('.for_power a').each(function() { $(this).append(' МВт'); });
			} else {
				$('.w-imap-line-bottom .w-imap-filter-title').text('Filtering objects on the map');
				$('.for_power a').each(function() { $(this).append(' MW'); });
				$('.w-imap-line-top').text('Company geography');
			}

			var filterHtml = '',
				counter = 0,
				counterAdd = 0,
				legendHTML = '',
				//halfCountPoints = Math.floor(this.options.points.length/2),
				halfCountPoints = Math.floor(38),
				powerLegend = '',
				typePointForLegend = 1,
				twoCol = false,
				hasTwoCol = false;

			$.each(this.options.filter, function(index, val){
				if (counter%4 == 0) {
					counterAdd++; 
					if (counterAdd > 1) {
						filterHtml += '</div>';
					}
					filterHtml += '<div class="w-imap-filter-group-col order_'+counterAdd+'">'; 
				} 
				filterHtml += '<a href="javascript:void(0)" class="w-imap-filter-item index_'+val.type+' active" data-id="'+(index+1)+'"><i></i>'+val.title[this.options.lang]+'</a>';
				counter++;
			}.bind(this));
			filterHtml += '</div>';

			$('.w-imap-filter-group.for_type').html(filterHtml);

			counter = 0;

			var that = this;
			this.powerFilter = this.container
				.find('.w-imap-filter-group.for_power .w-imap-filter-item')
				.on('click', function(){
					$(this).toggleClass('active');
					that._applyFilter();
				});
			this.typeFilter = this.container
				.find('.w-imap-filter-group.for_type .w-imap-filter-item')
				.on('click', function(){
					$(this).toggleClass('active');
					that._applyFilter();
				});
			this.options.types = {};
			$.each(this.typeFilter, function(index, typeDom){
				this.options.types[index+1] = {title: $(typeDom).html()};
			}.bind(this));

			$.each(this.options.points, function(index, point){
				index = parseInt(index)+1;
				this.points[index] = $('<a class="w-imap-point type_'+point.type+' index_'+point.block_id+'" href="javascript:void(0)"><i>'+index+'</i></a>')
					.css({left: point.coord[0], top: point.coord[1]})
					.data('index', index)
					.appendTo(this.pointContainer);
				var popupPlace = (point.coord[0] > 470) ? 'left' : 'right';
				var popupHtml = '<span class="w-imap-point-popup at_'+popupPlace+'">' +
					'<span class="w-imap-point-popup-tick"></span>' +
					'<span class="w-imap-point-popup-filter">'+this.options.types[point.type].title+'</span>' +
					'<span class="w-imap-point-popup-title">'+point.title[this.options.lang]+'</span>';
				if (point.power[0] !== null || point.power[1] !== null){
					var power = this._periodsFormat(point.power[0])
						+ ((point.power[1] !== null) ? ('+'+this._periodsFormat(point.power[1])) : '')
						+ ((this.options.lang == 'ru') ? ' МВТ' : ' MW');
					popupHtml += '<span class="w-imap-point-popup-power">'+power+'</span>';
				}
				// There's no image for the 40th point
				if (index<37) popupHtml += '<img src="/geography/i/stations_new/'+index+'_.jpg" alt=""/>';
				if (index>37) popupHtml += '<img src="/geography/i/stations_new/'+(index-1)+'_.jpg" alt=""/>';
				popupHtml += '</span>';
				$(popupHtml).appendTo(this.points[index]);

				// legend build
				counter++;
				
				if (counter == 1) {
					legendHTML += '<div class="w-imap-legend-col w-imap-legend-col_first"><div class="w-imap-legend_group"><div class="w-imap-legend_group__ttl type_'+point.type+'"><span>'+((this.options.lang == 'ru') ? ' МВТ' : ' MW')+'</span>'+this.options.types[point.type].title+'</div>';
				}
				if (!twoCol && counter >= halfCountPoints && typePointForLegend != parseInt(point.type)) {
					twoCol = true;
					legendHTML += '</div></div><div class="w-imap-legend-col">';
				}

				if (typePointForLegend != parseInt(point.type)) {
					if (!twoCol || hasTwoCol) {
						legendHTML += '</div>';
					}					
					
					legendHTML += '<div class="w-imap-legend_group"><div class="w-imap-legend_group__ttl type_'+point.type+'"><span '+((this.options.filter[point.type-1]['haspower'] != 1) ? 'style="display:none"' : '')+'>'+((this.options.lang == 'ru') ? ' МВТ' : ' MW')+'</span>'+this.options.types[point.type].title+'</div>';
				}

				legendHTML += '<div class="w-imap-legend-item">'
				if (point.power[0] !== null || point.power[1] !== null){ 
					powerLegend = this._periodsFormat(point.power[0])
						+ ((point.power[1] !== null) ? ('+'+this._periodsFormat(point.power[1])) : '');
				} else {
					powerLegend = '';
				}
				legendHTML += '<span class="w-imap-legend-power">'+powerLegend+'</span><span class="w-imap-legend_idx">'+index+'.</span>' + point.title[this.options.lang]+'</div>';

				typePointForLegend = parseInt(point.type);

				if (twoCol) {
					hasTwoCol = true;
				}
			}.bind(this));
			$('.w-imap-legend_cont').html(legendHTML+'</div>');
		},

		_applyFilter: function()
		{
			var powers = [], // Active power indexes
				types = [], // Active type indexes
				points = []; // Remaining points ids
			$.each(this.powerFilter, function(index, item){
				if ($(item).hasClass('active')) powers.push(parseInt(index));
			}.bind(this));
			$.each(this.typeFilter, function(index, item){
				if ($(item).hasClass('active')) types.push(parseInt($(item).data("id")));
			}.bind(this));
			$.each(this.options.points, function(index, point){
				// Filter by the power
				if (powers.length != this.powerFilter.length){
					// Power is not defined: show only when all powers are defined
					if (point.power[0] === null && point.power[1] === null) return;
					var power = (point.power[0] || 0) + (point.power[1] || 0),
						powerGroup = 0;
					if (100 < power && power <= 750) powerGroup = 1;
					else if (750 < power && power <= 1500) powerGroup = 2;
					else if (1500 < power && power <= 3000) powerGroup = 3;
					else if (3000 < power) powerGroup = 4;
					if ($.inArray(powerGroup, powers) == -1) return;
				}
				// Filter by the type
				if ($.inArray(point.type, types) == -1) return;
				points.push(parseInt(index));
			}.bind(this));
			// Show/hide points
			$.each(this.options.points, function(index, point){
				this.points[index+1][($.inArray(parseInt(index), points) == -1)?'hide':'show']();
			}.bind(this));
		},

		/**
		 * Format periods on lang preferences
		 * @private
		 */
		_periodsFormat: function (x) {
			if (x == undefined) return x;
			var delimiter = '',
				decimals = '.',
				parts = x.toString().split(".");

			if (this.options.lang == 'en'){
				delimiter = ',';
				decimals = '.';
			}
			if (this.options.lang == 'ru'){
				delimiter = ' ';
				decimals = ',';
			}

			return parts[0].replace(/\B(?=(\d{3})+(?=$))/g, delimiter) + (parts[1] ? decimals + parts[1] : "");
		}
	});
	new Imap1(container, {lang: lang});
};

// Перед уничтожением виджета
var deinitImap1 = function(container, lang){};
