-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: mysql51.sadecehosting.com
-- Üretim Zamanı: 08 May 2013, 11:37:17
-- Sunucu sürümü: 5.1.63-log
-- PHP Sürümü: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `mnvdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cs_quick_answers`
--

CREATE TABLE IF NOT EXISTS `cs_quick_answers` (
  `answer_id` int(9) NOT NULL AUTO_INCREMENT,
  `answer_type_id` int(1) NOT NULL,
  `answer_description` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `answer` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=56 ;

--
-- Tablo döküm verisi `cs_quick_answers`
--

INSERT INTO `cs_quick_answers` (`answer_id`, `answer_type_id`, `answer_description`, `answer`) VALUES
(6, 1, 'İndirim - Kupon İsteği 4', 'Kampanya ve indirim fırsatlarımızı günlük olarak paylaşıyoruz. Fırsatlarımızdan yararlanmak için bizi takip etmeye devam edin.'),
(3, 1, 'İndirim - Kupon isteği 1', 'Kupon ya da indirim fırsatlarımızdan faydalanmak mı istiyorsunuz? Günlük e-posta’larımızı ve duyurularımızı takip edin.'),
(4, 1, 'İndirim - Kupon isteği 2', 'İndirimi kapın, kazanın! Siz de indirim fırsatlarımızı yakalamak istiyorsanız, duyuru e-posta’larımızı takip edin!'),
(5, 1, 'İndirim - Kupon isteği 3', 'Markafoni’de sizin için de harika fırsatlarımız var! Fırsatlarımızdan yararlanmak için e-posta kutunuzu sık sık kontrol edin!  '),
(7, 1, 'E-Postanızı kontrol edin', 'Markafoni’de sizin için de harika fırsatlarımız var! Fırsatlarımızdan yararlanmak için e-posta kutunuzu sık sık kontrol edin!'),
(8, 2, 'Cevap 1', 'Modellerimizle ilgili görüşleriniz için teşekkür ederiz. İlerleyen dönemlerde, sitemizde farklı modellerle karşılaşabilirsiniz. '),
(9, 2, 'Cevap 2', 'Modellerimizle ilgili görüşleriniz için teşekkür ederiz. Çok yakında, birbirinden çekici modellerle karşınızda olacağız. '),
(10, 2, 'Cevap 3', 'Uzman ekibimizi dünyanın en güzel modellerini bulmakla görevlendirdik. Çok yakında, yeni modellerle karşınızdayız! '),
(11, 3, 'Bakım Çalışması', 'Kendimizi biraz bakıma aldık. Yenilenip, tazelenip, geri döneceğiz. Bizi beklediğiniz için teşekkür ederiz. '),
(12, 3, 'Bakım Çalışması', 'Kısa bir bakım çalışmasının tam ortasında, yaratıcı ve heyecan veren yeniliklerin peşindeyiz. Bizi beklediğiniz için teşekkür ederiz. '),
(13, 3, 'Site Yavaş', 'Kontrol ettik, sitemizde teknik bir sorun bulamadık. İşlemlerinize farklı bir İnternet tarayıcısı üzerinden devam etmeye ne dersiniz?  '),
(14, 3, 'Site Yavaş', 'Sitemiz bugün bomba gibi! İşlemlerinizi farklı bir İnternet tarayıcısı üzerinden yenilemeye ne dersiniz? '),
(15, 3, 'Login Problemi', 'Lütfen panik yapmayın.  Derin bir nefes alın ve https://www.markafoni.com/account/reset_password/ linki üzerinden şifrenizi sıfırlayın. '),
(16, 3, 'Şifremi Unuttum', 'https://www.markafoni.com/account/reset_password/ linki üzerinden şifrenizi sıfırlayın, alışverişe kaldığınız yerden devam edin! '),
(17, 3, 'Genel Bilgi', 'Konu hakkında hemen sizi bilgilendirelim! Bunun için, destek@markafoni.com  adresimize e-posta göndermenizi rica ederiz. '),
(18, 3, 'Markafoni Neden Güvenli', 'Markafoni’de alışverişler çok güvenli! http://www.markafoni.com/cms/guvenlik/ linkinde tüm güvenlik sırlarımızı açıklıyoruz!  '),
(19, 3, 'Markafoni Neden Güvenli', 'Bize güvenmeniz için birden çok neden var!  http://www.markafoni.com/cms/guvenlik/ linkinde tüm bu nedenleri açıklıyoruz! '),
(20, 4, 'Kupon Kullanımı', 'SSS bölümümüzde bu sorunuzu yanıtlıyoruz. http://www.markafoni.com/cms/sss/ linkini inceleyerek bilgi sahibi olabilirsiniz. '),
(21, 4, 'Kodlu Kupon Kullanımı', 'SSS bölümümüzde bu sorunuzu yanıtlıyoruz. http://www.markafoni.com/cms/sss/ linkini inceleyerek bilgi sahibi olabilirsiniz.'),
(22, 4, 'İndirim Kullanımı', 'SSS bölümümüzde bu sorunuzu yanıtlıyoruz. http://www.markafoni.com/cms/sss/ linkini inceleyerek  bilgi sahibi olabilirsiniz.'),
(23, 4, 'Segmentasyon Kampanyaları', 'Size özel bu kampanyamızdan faydalanmak için destek@markafoni.com  adresimize e-posta göndermenizi rica ederiz.'),
(24, 5, 'Sadece Kredi Kartı', 'Markafoni’de sadece kredi kartlarıyla alışveriş yapabilirsiniz. Ödemenizi taksitle ya da tek çekimle yapabilirsiniz. '),
(25, 6, 'Kargom nerede', 'Endişelenmeyin, kargonuz emin ellerde. Teslimat durumunuzu kontrol etmemiz için sipariş takip numaranızı paylaşmanızı rica ederiz. '),
(26, 6, 'Kargom nerede', 'Kargonuz tüm hızıyla size geliyor. Şu an nerede olduğunu öğrenebilmemiz için sipariş takip numaranızı paylaşmanızı rica ederiz.'),
(27, 6, 'Kargom nerede', 'Kargonuz trafiğe mi takıldı? destek@markafoni.com  adresimize detaylı bir e-posta gönderin, hemen inceleyelim! '),
(28, 7, 'İş Başvurusu', 'Markafoni ailesinin bir üyesi olmak çok keyifli! Bu keyfi yaşamak için destek@markafoni.com adresimize detaylı bir e-posta göndermenizi rica ederiz. '),
(29, 7, 'İş Başvurusu', 'Ailemize katılmak mı istiyorsunuz? destek@markafoni.com adresimize e-posta gönderin, iş fırsatlarımızdan bahsedelim. '),
(30, 8, 'Sizinle çalışmak istiyorum', 'Bizimle çalışmak istemenize memnun olduk. pr@markafoni.com adresine detaylı bir e-posta gönderin, hemen sizi arayalım. '),
(31, 8, 'Sizinle çalışmak istiyorum', 'Birlikte çok güzel işler yapabiliriz. pr@markafoni.com adresine detaylı bir e-posta gönderin, hemen sizi arayalım! '),
(32, 9, 'Teşekkür', 'Sürprizimizi sevdiğinize memnun olduk. Daha güzel sürprizler için bizi takip edin.'),
(33, 9, 'Teşekkür', 'Teşekkür ederiz! Bol sürprizli Markafoni kutularımızla alışveriş aşkınızı doyasıya yaşamaya devam edin! '),
(34, 9, 'Şikayet', 'Sürprizimizden memnun kalmadığınıza üzüldük! Gelecek alışverişlerinizde size uygun sürprizler hazırlamaya çalışacağız. '),
(35, 9, 'Yanlış Giden Sürpriz', 'O kadar çok sürpriz yapıyoruz ki, bazen küçük aksaklıklar yaşayabiliyoruz. Gelecek alışverişinizde doğru sürprizle karşınıza çıkacağız! '),
(36, 10, 'Üyeyi Takibe Aldık', 'Sizi yakın takibe aldık. Dilerseniz, bize DM atabilirsiniz. '),
(37, 10, 'Üyeyi Takibe Aldık', 'Size bir DM kadar uzağız! İletişim bilgilerinizi DM üzerinden paylaşırsanız, hemen dönüş yapacağız. '),
(38, 11, 'Sorun Bildirimi', 'Teknik destek bölümümüz sorunu çözmek için çalışıyor. En kısa sürede mobil alışveriş keyfine kaldığınız yerden devam edeceksiniz. '),
(39, 11, 'Uygulama Yükleme Adresi', 'Mobil  alışverişi keyifle yaşamak için https://itunes.apple.com/tr/app/markafoni/id301344410?l=tr&mt=8 üzerinden uygulamamamızı indirin! '),
(40, 11, 'Uygulama Güncelleniyor', 'Bizi, güncellemenin tam ortasında yakaladınız! Birkaç küçük yenilik yapıp döneceğiz. Beklediğinize değecek! '),
(41, 12, 'Üyeyi Takibe Aldık', 'Sizi takibe aldık! DM mesajı atarak sorununuzu bizimle paylaşır mısınız? '),
(42, 12, 'Mail Adresi Gönder', 'Bu konuyu sizinle özel olarak görüşmek isteriz. destek@markafoni.com adresimize detaylı bir e-posta gönderebilir misiniz? '),
(43, 13, 'Genel Bilgi', 'Markafoni’de kargo bedeli sadece 6,90 TL. “Kargo Bedava” fırsatını yakalayanlara ise gerçekten de bedava! '),
(44, 13, 'Şikayet', 'Siz bu satırları okurken, öneri ve şikayetlerinizi ilgili birimimize ilettik. Teşekkürler! '),
(45, 14, 'Duyuru Almak İstemiyor', 'Duyuru e-posta listemizden çıkmak istediğinize emin misiniz? \r\nhttps://www.markafoni.com/account/update_profile/ linki üzerinden işlem yapabilirsiniz. \r\n'),
(46, 14, 'Duyuruları Almak İstiyor', 'Duyuru e-posta listemize dahil olmak çok kolay!  https://www.markafoni.com/account/update_profile/ linki üzerinden işlem yapmanız yeterli!  '),
(47, 14, 'Duyuru maillerini takip edin', 'Kargo bedava, indirimler ve özel happy hour kampanyalarımızı kaçırmak istemiyorsanız, duyuru e-posta’larımızı takip edebilirsiniz.'),
(48, 15, 'Hatalı Ürün Gönderimi', 'Sizi, satın aldığınız ürünle buluşturamadığımız için üzgünüz! Sorununuzu çözmek istiyoruz. Sipariş numaranızı öğrenebilir miyiz?'),
(49, 15, 'Defolu/Hatalı Gönderim', 'Alışveriş keyfiniz yarıda kaldığı için çok üzgünüz! Sorununuzu destek@markafoni.com adresinden bize iletebilir misiniz? '),
(50, 16, 'Hangi Kampanya Çıkacak?', 'Marka ekibimiz, gelecek kampanyaları sır gibi saklıyor. Favori markalarınızı yakalamak için sitemizi her gün ziyaret etmenizi tavsiye ederiz. '),
(51, 16, 'Kampanyayı Tekrarlayın', 'Beğenilen kampanyalarımızı yeniden satışa sunabiliyoruz. Fırsatları kaçırmamak için duyuru e-posta’larımızı takip etmenizi öneririz. '),
(52, 16, 'Hangi Kampanya Çıkacak?', 'Kampanyalarımız konusunda ser verip sır vermiyoruz! İyisi mi siz, duyuru e-posta’larımızı takip edin! '),
(53, 17, 'Sorununuz Nedir?', 'Bizimle ilgili bir sorununuz mu var? Size nasıl yardımcı olabiliriz? '),
(54, 17, 'Sorununuzu Email Atın', 'Sorun neyse, çözüm bulmak isteriz. destek@markafoni.com adresine detaylı bir e-posta gönderebilir misiniz? '),
(55, 17, 'Sorununuzu Email Atın', 'Size yardımcı olmak isteriz. destek@markafoni.com adresine detaylı bir e-posta gönderebilir misiniz? ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cs_quick_answer_types`
--

CREATE TABLE IF NOT EXISTS `cs_quick_answer_types` (
  `answer_type_id` int(9) NOT NULL AUTO_INCREMENT,
  `answer_type_description` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`answer_type_id`),
  KEY `answer_type_id` (`answer_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=18 ;

--
-- Tablo döküm verisi `cs_quick_answer_types`
--

INSERT INTO `cs_quick_answer_types` (`answer_type_id`, `answer_type_description`) VALUES
(1, 'İndirim, Hediye Çeki veya Kupon İsteyenler'),
(2, 'Modelleri Beğenmeyenler'),
(3, 'Teknik Sorunlar'),
(4, 'Hediye Çeki ve Kupon Kullanımı Soruları'),
(5, 'Ödeme Seçenekleri Soruları'),
(6, 'Kargo Şikayetleri'),
(7, 'İş Başvuruları'),
(8, 'Sponsorluk ve Reklam Talepleri'),
(9, 'Kutudan Çıkan Promosyonlar'),
(10, 'Direk Mesaj Atmak İsteyen Üyeler'),
(11, 'Mobil Uygulamayla İlgili Sorular'),
(12, 'Israrcı Üyeler'),
(13, 'Kargo Ücreti'),
(14, 'Günlük E-Postaları Eleştirenler'),
(15, 'Defolu Hatalı Ürün Gönderimi'),
(16, 'Gelecek Kampanya İçeriği'),
(17, 'Kategorisiz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cs_users`
--

CREATE TABLE IF NOT EXISTS `cs_users` (
  `user_id` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_screen_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `twitter_user_id` int(10) NOT NULL,
  `twitter_oauth_token` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_oauth_token_secret` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_oauth_verifier` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Tablo döküm verisi `cs_users`
--

INSERT INTO `cs_users` (`user_id`, `username`, `password`, `twitter_screen_name`, `twitter_user_id`, `twitter_oauth_token`, `twitter_oauth_token_secret`, `twitter_oauth_verifier`) VALUES
(1, 'unutmayalim', '', '', 0, 'peRAh2x6HQycJfrREMcr1QV6qQ7mfjryRbwIISolo', 'jSpnrizvLkbai5x2rt3jn3cUj7iiKdMbqlJ99ARzsw', 'ePAzLtKVtqv2XvDAIwHZsYn3dSbuEhhxXu9hm2cUNBU'),
(2, 'ozandikerler', 'Greytoad64', '', 0, '', '', ''),
(3, '1', '1', 'ozandikerler', 283953202, '283953202-sh8yAhh6SBsVQz5FEJIhp33DlJS6TjjS4msJKHhL', 'cEwW8SK6ImS3ZHlPjNWRgMllC3pF090bTbhAvcKbJOc', ''),
(4, '2', '2', 'OktayDuymz', 307779541, '307779541-xkjR4A7Nk9efc6MvnCNlEwkUZIt5wjGc85w2EdUt', 'pEtnaIXemZ4NEfT7HZFlCwtqj7TiVrGYjwLH3kOHw', ''),
(5, '3', '3', '', 0, 'FwgtKxYa9rkbC7u2PNLMQ2RWl7TmFjencj4bY6tonE', '7c0GdCLhbw2m1bJb0yFAXVt10HRVDnOfomgjux8wmWI', 'm4xS8GFJOrWt9mzE9CClvrQzB0RkIQUZYdcUk1U0'),
(6, '4', '4', '', 0, '03R9G2chamI8Ch6NpbBQgB1b9Oj6Xdq2xmvujA9wCq8', 'QDz3zYzPwwDhgbkdXaXKdnzGrBFPXhl84sPgpNakU', 'ePAzLtKVtqv2XvDAIwHZsYn3dSbuEhhxXu9hm2cUNBU'),
(7, '5', '5', '', 0, 'nYRNLr25bXmHojdTs5MVCdJD3aF4Dh83lcbLj4QKuZs', 'E7g4wwhESjG9BHzan2XrIUODC6xjiNHiVQZyhFSlJs', 'wEPBIleShChQU2DDo3lEbQfGID9YxBoNJiCmgErqRIk'),
(8, '6', '6', '', 0, '', 'qZN5V0DIQ9AACcpW5HepejuUNzcSpeYbNNuHoY', 'LUAO4EgiaGI92jBNeGIrzEmLXUBdabfMslMqKRzj94'),
(9, '7', '7', '', 0, 'VQrkMyBtTrS41frarysu46NpdsqfLWvd8xmTqxM8hA', 'qLFXFdnpVmvWj3RxN12F87uU32F7x7uNZ66sQ8mc', ''),
(10, '8', '8', '', 0, '', 'KqOV0GO6SYBbPSWiEjndRiRUDaR3UReJyU5v6nG0W8', 'VrQBbNqrZa4mKYwtsdsTht5ItgsWzLqVS7AtaJok'),
(11, '9', '9', '', 0, 'fErkmhaVR0sjvvjc2AIsb3RSl6sQGnri9Jiu68wJrVo', 'Ldsg1ct7NWD4UP0QkT2Ib7KyYdMzCdSUZF3LKIJAII', 'AZlL6CAs41CTfiFiZsx7xZqusibvdsROUO2dLaE8p0'),
(12, 'erkan', 'erkan', '', 0, '', '', ''),
(13, 'markafoni', 'markafoni', '', 0, '', '', ''),
(14, 'alex', 'alex', '', 0, '', '', ''),
(15, 'tolga', 'tolga', '', 0, '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
