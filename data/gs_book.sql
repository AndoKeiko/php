-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
<<<<<<< HEAD
-- 生成日時: 2024-06-12 04:14:02
=======
-- 生成日時: 2024-06-17 11:05:21
>>>>>>> 3da83af (PHP選手権用提出)
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_book`
--

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- テーブルの構造 `bookcase_table`
--

CREATE TABLE `bookcase_table` (
  `fid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `bid` int(12) NOT NULL,
  `bcount` int(6) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
=======
>>>>>>> 3da83af (PHP選手権用提出)
-- テーブルの構造 `book_category`
--

CREATE TABLE `book_category` (
  `cid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `cname` varchar(525) NOT NULL,
<<<<<<< HEAD
  `ctext` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `book_detail`
--

CREATE TABLE `book_detail` (
  `did` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `status` int(2) NOT NULL,
  `cid` int(5) NOT NULL,
  `tid` int(5) NOT NULL,
=======
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `book_category`
--

INSERT INTO `book_category` (`cid`, `uid`, `cname`, `indate`) VALUES
(1, 8, '花とゆめ', '2024-06-13 02:15:36'),
(5, 8, 'LaLa', '2024-06-13 02:18:33'),
(6, 8, 'ゲッサン', '2024-06-14 16:56:31'),
(7, 8, 'PHP', '2024-06-15 18:14:10');

-- --------------------------------------------------------

--
-- テーブルの構造 `book_search_table`
--

CREATE TABLE `book_search_table` (
  `bid` int(11) NOT NULL,
  `uid` int(12) NOT NULL,
  `gid` varchar(128) NOT NULL,
  `isbn10` int(10) NOT NULL,
  `isbn13` int(13) NOT NULL,
  `title` varchar(566) NOT NULL,
  `authors` varchar(256) NOT NULL,
  `publisher` varchar(256) NOT NULL,
  `publishedDate` varchar(128) NOT NULL,
  `thumbnail` varchar(526) NOT NULL,
  `description` text NOT NULL,
  `buyLink` varchar(566) NOT NULL,
>>>>>>> 3da83af (PHP選手権用提出)
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `book_table`
--

CREATE TABLE `book_table` (
  `bid` int(11) NOT NULL,
  `uid` int(12) NOT NULL,
  `gid` varchar(128) NOT NULL,
<<<<<<< HEAD
  `isbn` varchar(125) NOT NULL,
=======
  `isbn10` varchar(125) NOT NULL,
  `isbn13` varchar(125) NOT NULL,
>>>>>>> 3da83af (PHP選手権用提出)
  `title` varchar(566) NOT NULL,
  `authors` varchar(256) NOT NULL,
  `publisher` varchar(256) NOT NULL,
  `publishedDate` varchar(128) NOT NULL,
  `thumbnail` varchar(526) NOT NULL,
  `description` text NOT NULL,
  `buyLink` varchar(566) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `book_table`
--

<<<<<<< HEAD
INSERT INTO `book_table` (`bid`, `uid`, `gid`, `isbn`, `title`, `authors`, `publisher`, `publishedDate`, `thumbnail`, `description`, `buyLink`, `indate`) VALUES
(7, 8, 'Fzz2EAAAQBAJ', '0', 'ドラえもん学びワールドスペシャル　はじめての料理', '藤子・Ｆ・不二雄,藤子プロ,上田淳子', '小学館', '2024-02-28', 'http://books.google.com/books/content?id=Fzz2EAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '【ご注意】※この電子書籍は紙の本のイメージで作成されており、文字だけを拡大することや、文字列のハイライト、検索、辞書の参照、引用などの機能が使用できません。お手持ちの端末で立ち読みファイルをご確認いただくことをお勧めします。 ドラえもんの大好物・どら焼きを作ろう！ ドラえもんのまんがには、 食べたいものが出てくる「グルメテーブルかけ」など 食事にまつわるお話がたくさんあります。 本書は、ドラえもんのおもしろいまんがを読みながら、 「はじめての料理」を楽しく学べる一冊です。 子どもが自分で野菜をさわり、観察し、切ったり焼いたりすることで、 苦手なはずの野菜でも不思議と食べられるようになることが多いです。 さらに、どんな順番で料理をするのか考えるので、「段取り力」が自然と身につきます。 また、玉ねぎを切ると涙が出たり、湯をわかすと大きな泡が鍋底から 出てくるなど、理科の知識を実体験として学ぶことができます。 地頭を鍛え、生活力を育む「料理」をはじめましょう！ ホットケーキミックスでつくるどら焼きから、 基本のごはんのたき方、みそしるの作り方、 のっけパンにおにぎり、いためもの、にもの、 ラーメンにカレーライスと、いますぐ作りたい４４のレシピをお届けします。 監修者は、テレビ番組『きょうの料理』『あさイチ』（ＮＨＫ）でも おなじみの人気料理研究家の上田淳子先生。 ふたごの子どもの育児経験から食育についても活動されています。 ※この作品にはカラーが含まれます。 ※電子書籍なので、本文中に書き込むことはできません。必要に応じてメモ用紙などをご用意ください。', 'https://play.google.com/store/books/details?id=Fzz2EAAAQBAJ&rdid=book-Fzz2EAAAQBAJ&rdot=1&source=gbs_api', '2024-06-11 20:29:32'),
(9, 8, 'PFVxEAAAQBAJ', '0', 'スキップ・ビート！【通常版】　48巻', '仲村佳樹', '白泉社', '2022-06-20', 'http://books.google.com/books/content?id=PFVxEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'ついに動き出した日米合作の大作映画『Ｒｏｕｔｅ』プロジェクト。同作の監督・総指揮のレナードが、蓮の次に出会う人物とは…!? そして一方で「泥中の蓮」の撮影を続けるキョ―コにも、彼女にとっての初めての「ある試練」が訪れていた…。連載20周年を記念して、著者初の画集つき特装版も同時発売！※別に、48巻の【連載20周年記念イラスト集つき特装版】も配信しております。', 'https://play.google.com/store/books/details?id=PFVxEAAAQBAJ&rdid=book-PFVxEAAAQBAJ&rdot=1&source=gbs_api', '2024-06-11 20:31:22'),
(10, 8, '2QyyEAAAQBAJ', '0', 'スキップ・ビート！　49巻', '仲村佳樹', '白泉社', '2023-03-20', 'http://books.google.com/books/content?id=2QyyEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '日米合作の撮影を控え、米国スタッフと模擬演習を始めたキョ―コたち。しかし、人員不足でキョ―コまで演者に駆り出されることに…!?奏江や村雨と撮影に挑むキョ―コを見て、蓮はある想いを抱く――。鼓動早まる49巻！', 'https://play.google.com/store/books/details?id=2QyyEAAAQBAJ&rdid=book-2QyyEAAAQBAJ&rdot=1&source=gbs_api', '2024-06-11 20:34:21'),
(11, 8, 'RM-ADwAAQBAJ', '0', 'スキップ・ビート！　43巻', '仲村佳樹', '白泉社', '2019-01-18', 'http://books.google.com/books/content?id=RM-ADwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'キョーコ、その演技で堅物Ｐ・呉崎を納得させ「泥中の蓮」紅葉役を見事獲得!! 一方、波乱は最後まで――同作・千鳥役オーディションを順調に進んでいた盟友・モー子が、まさかの…？ さらにはそんな折、何者かがキョーコに突然襲いかかり――!?', 'https://play.google.com/store/books/details?id=RM-ADwAAQBAJ&rdid=book-RM-ADwAAQBAJ&rdot=1&source=gbs_api', '2024-06-12 00:31:43'),
(12, 8, '1zz2EAAAQBAJ', '0', 'ドラえもん学びワールド　音楽をはじめよう', '藤子・Ｆ・不二雄,藤子プロ,久保田慶一', '小学館', '2024-02-28', 'http://books.google.com/books/content?id=1zz2EAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '【ご注意】※この電子書籍は紙の本のイメージで作成されており、文字だけを拡大することや、文字列のハイライト、検索、辞書の参照、引用などの機能が使用できません。お手持ちの端末で立ち読みファイルをご確認いただくことをお勧めします。 音楽がもっと身近に、面白くなる！ この本は、ドラえもんのまんがを楽しみながら「音楽」について学べる、おもしろくてためになる本です。 みんなは嬉しい気分のとき、思わず鼻歌を歌ってしまった経験はあるでしょうか。落ち込んでいるとき、大好きな曲に励まされたことがあるという人もいるかもしれませんね。 音楽は人間の感情をゆさぶります。それはどうしてでしょう。その理由もこの本には書いてあります。 解説記事を読むと、音楽の歴史や文化から、さまざまなジャンルの音楽についても詳しくなれるはずです。 また、「やってみよう！ なっとくワーク」に挑戦すれば、歌を歌ったり楽器を鳴らしたりするのが楽しくなるでしょう。 まんがを読んで解説記事を読んだ後は、ぜひ実際に音楽をはじめてみてください。姿勢と呼吸を意識しながら歌を歌ったり、学校や家にある楽器をリズムにのって鳴らしてみましょう。 この本を読むことによって、あなたは音楽の世界の扉を開け、今までよりいっそう音楽を楽しめるようになるでしょう。 ※一部カラーが含まれます。 ※電子書籍なので、本文中に書き込むことはできません。必要に応じてメモ用紙などをご用意ください。', 'https://play.google.com/store/books/details?id=1zz2EAAAQBAJ&rdid=book-1zz2EAAAQBAJ&rdot=1&source=gbs_api', '2024-06-12 01:51:41'),
(13, 8, 'BbiTzwEACAAJ', '0', 'コレットは死ぬことにした ―女神編―', '幸村アルト', '', '2023-03-20', 'http://books.google.com/books/content?id=BbiTzwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '女神となったコレットと冥王・ハデスの甘々な結婚生活がスタート! と思いきや、天界での挨拶回りや冥府での大事件など、波乱続き!? 2人は無事乗り越えられるのか...!? 花とゆめに掲載された、本編では描かれなかった2人の初めての「結婚式」エピソードも収録! シリーズ累計340万部突破の大人気作『コレットは死ぬことにした』、連載完結後の2人を描いた続編! 笑いありほっこりありキュンありの世界を再び! 2023年3月刊', '-', '2024-06-12 11:09:08'),
(14, 8, '9LiXDwAAQBAJ', '0', 'コレットは死ぬことにした　13巻', '幸村アルト', '白泉社', '2019-05-20', 'http://books.google.com/books/content?id=9LiXDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'ハデス様と想いが通じたコレット。それを知ったガイコツ達の反応は――？ 更にディオのお手伝いをしに天界へ行ったコレットはそこで新たな騒動に巻き込まれ…。シリーズ史上華やかさ最高潮★ 美男美女の神様大集合で大盛り上がりの13巻！', 'https://play.google.com/store/books/details?id=9LiXDwAAQBAJ&rdid=book-9LiXDwAAQBAJ&rdot=1&source=gbs_api', '2024-06-12 11:09:57');

-- --------------------------------------------------------

--
-- テーブルの構造 `book_tag`
--

CREATE TABLE `book_tag` (
  `tid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `tname` varchar(526) NOT NULL,
  `ttext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
=======
INSERT INTO `book_table` (`bid`, `uid`, `gid`, `isbn10`, `isbn13`, `title`, `authors`, `publisher`, `publishedDate`, `thumbnail`, `description`, `buyLink`, `indate`) VALUES
(30, 8, 'oHgO0AEACAAJ', '2147483647', '2147483647', 'TVアニメ『鬼滅の刃』 公式キャラクターズブック伍ノ巻', '-', 'ホーム社', '2023-09-04', 'http://books.google.com/books/content?id=oHgO0AEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'TVアニメ『鬼滅の刃』公式キャラクターズブック!! 表紙、ポスター(表面)は新規ufotable描き下ろしのイラストを使用。ファン必携の綴じ込みスペシャルシール付。伍ノ巻は、「遊郭編」を大特集!! カラーギャラリー、登場人物紹介、設定資料など「遊郭編」の魅力を1冊に凝縮。豪華声優陣が熱く語るQ&A企画も見逃せない、総ページ62Pのハンディーな1冊!!', '-', '2024-06-12 14:07:06'),
(34, 8, '9LiXDwAAQBAJ', '2147483647', '2147483647', 'コレットは死ぬことにした　13巻', '幸村アルト', '白泉社', '2019-05-20', 'http://books.google.com/books/content?id=9LiXDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'ハデス様と想いが通じたコレット。それを知ったガイコツ達の反応は――？ 更にディオのお手伝いをしに天界へ行ったコレットはそこで新たな騒動に巻き込まれ…。シリーズ史上華やかさ最高潮★ 美男美女の神様大集合で大盛り上がりの13巻！', 'https://play.google.com/store/books/details?id=9LiXDwAAQBAJ&rdid=book-9LiXDwAAQBAJ&rdot=1&source=gbs_api', '2024-06-13 10:45:58'),
(37, 8, 'Zux9DwAAQBAJ', '2147483647', '2147483647', 'スキップ・ビート！　42巻', '仲村佳樹', '白泉社', '2018-05-18', 'http://books.google.com/books/content?id=Zux9DwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '“紅葉”オーディションの空き時間、「泥中の蓮」主演の古賀さんと談笑していると、突然核心を突く一言が…。キョーコの返答は？ さらに、オーディションは佳境へ――。森住仁子は手段を選ばずキョーコを追い落としにかかり…？', 'https://play.google.com/store/books/details?id=Zux9DwAAQBAJ&rdid=book-Zux9DwAAQBAJ&rdot=1&source=gbs_api', '2024-06-13 13:37:47'),
(38, 8, 'Mo_KEAAAQBAJ', '2147483647', '2147483647', '鬼滅の刃 キメツ学園！全集中ドリル 風の呼吸編', '吾峠呼世晴,帆上夏希,白數哲久', '集英社', '2023-08-18', 'http://books.google.com/books/content?id=Mo_KEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '「鬼滅の刃 キメツ学園！全集中ドリル 風の呼吸編」、8月18日配信スタート!! ※配信日は変更になることがあります。ご了承ください。', 'https://play.google.com/store/books/details?id=Mo_KEAAAQBAJ&rdid=book-Mo_KEAAAQBAJ&rdot=1&source=gbs_api', '2024-06-13 14:56:22'),
(42, 8, 'xaf1EAAAQBAJ', '0', '0', 'スキップ・ビート！　50巻', '仲村佳樹', '白泉社', '2024-03-19', 'http://books.google.com/books/content?id=xaf1EAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '日米合作の撮影に向けた模擬演習に挑むキョ―コ。しかしその最中の蓮からの意外な言葉で、二人の関係に新展開が!?そしてついに舞台は米国ハリウッドへ――。そこでキョ―コたちの前に立ちはだかるのは…。大台の50巻！', 'https://play.google.com/store/books/details?id=xaf1EAAAQBAJ&rdid=book-xaf1EAAAQBAJ&rdot=1&source=gbs_api', '2024-06-13 18:55:37'),
(44, 8, 'ltvmDwAAQBAJ', '2147483647', '2147483647', 'コレットは死ぬことにした【マンガ「コツメくん日記２」小冊子付き特装版】　16巻', '幸村アルト', '白泉社', '2020-06-19', 'http://books.google.com/books/content?id=ltvmDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '新メンバー加入で益々賑やかになった冥府の歓迎会とは…!?旅に戻ったコレットが辿り着いたのは薬師が常駐していない「遍歴医の村」。そこで出会ったのは喧嘩別れして10年ぶりに再会した訳あり親子でーー。大人気★ハートフル神話ストーリー、心温まる第16巻！ザ花で大人気のスピンオフシリーズ第２弾！冥府のマスコットキャラクター・コツメくんが今回も右に左に大奮闘★魚になったり、接待をしたり、なんと天界で迷子になったり…!?描きおろしエピソードも入っている56ページの大ボリューム小冊子付特装版！ ※別に配信している「コレットは死ぬことにした」16巻【通常版】と本編が重複しておりますのでご注意ください。', 'https://play.google.com/store/books/details?id=ltvmDwAAQBAJ&rdid=book-ltvmDwAAQBAJ&rdot=1&source=gbs_api', '2024-06-13 20:58:53'),
(45, 8, 'zs--EAAAQBAJ', '2147483647', '2147483647', '婚約者は溺愛のふり　3巻', '仲野えみこ', '白泉社', '2023-06-05', 'http://books.google.com/books/content?id=zs--EAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '利害関係が一致し、契約的な婚約者となったラチエルとファハド。恋愛は下手くそだけど、だんだんファハドとの距離が近くなってきたのではないかと自信をつけるラチエル。（※ただし、いちゃいちゃモードには全然まったく少しも慣れない。）ある日、ラチエルの父が怪我をした事で出張先にファハドが一緒についてくる事に！？（このコミックスには「婚約者は溺愛のふり［1話売り］ story09～12」を収録しております）', 'https://play.google.com/store/books/details?id=zs--EAAAQBAJ&rdid=book-zs--EAAAQBAJ&rdot=1&source=gbs_api', '2024-06-13 22:08:04'),
(46, 8, '45MIEQAAQBAJ', '0', '0', '塩の街　～自衛隊三部作シリーズ～　5巻', '弓きいろ,有川ひろ,有川浩', '白泉社', '2024-06-05', 'http://books.google.com/books/content?id=45MIEQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'ライター志望の少年・ノブオと行動する秋庭と真奈。真奈に想いを寄せるノブオは二人のキスを目撃し…秋庭のいない間に真奈を連れ出して!?一方、再建された自衛隊で臨時司令となった入江は何者かに拉致され…。真奈の恋を後押しした野坂夫婦の出会いのストーリーも収録。', 'https://play.google.com/store/books/details?id=45MIEQAAQBAJ&rdid=book-45MIEQAAQBAJ&rdot=1&source=gbs_api', '2024-06-14 00:02:11'),
(47, 8, 'wesYEAAAQBAJ', '2147483647', '2147483647', '名探偵　耕子は憂鬱【電子限定「神様はじめました」番外編付き特装版】　1巻', '鈴木ジュリエッタ', '白泉社', '2021-02-19', 'http://books.google.com/books/content?id=wesYEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '【電子限定「神様はじめました」番外編付き！】★コミックス未収録になっていた、「神様はじめました」幻の番外編２本が読める！奈々生と巴衛のその後は…？(『ザ花とゆめ』2018年6/1号、2020年3/1号掲載)★昭和中期、日本には難事件を３つ解決した者だけに探偵のお免状を与える、という法があった――。探偵見習の少女・耕子は、東京の下宿・春秋館に暮らす名家の子息・犬上くんに宛てられた殺人予告の犯人を突き止めてほしい、という依頼を受ける。下宿人の世話をする「賄い人」として春秋館に潜入し、捜査することになった耕子。しかし、料理は苦手、推理も苦手な耕子はてんてこ舞い！しかも、そこに住む４人の下宿人は、とんでもないくせ者ぞろいで…!?「神様はじめました」の鈴木ジュリエッタが贈る、新感覚の共同生活×推理×ラブコメディ！※別に配信している「名探偵 耕子は憂鬱」1巻【通常版】と本編が重複しておりますのでご注意ください。', 'https://play.google.com/store/books/details?id=wesYEAAAQBAJ&rdid=book-wesYEAAAQBAJ&rdot=1&source=gbs_api', '2024-06-14 16:51:25'),
(48, 8, 'bJ6ADwAAQBAJ', '0', '0', '図書館戦争　LOVE&WAR　別冊編　6巻', '弓きいろ,有川ひろ,有川浩', '白泉社', '2018-07-05', 'http://books.google.com/books/content?id=bJ6ADwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '入隊七年目の春。郁は初めて、教官として新隊員の指導をすることに。憧れの「堂上教官」を目指すが…はたして？ 一方、郁にお願いされ自分の新人時代の話をすることになった堂上は、小牧と知り合った頃や高校生の郁を助けた時の想いを告白★ さらに郁からも意外な昔話が…!?', 'https://play.google.com/store/books/details?id=bJ6ADwAAQBAJ&rdid=book-bJ6ADwAAQBAJ&rdot=1&source=gbs_api', '2024-06-14 16:54:15'),
(49, 8, 'YqUEEQAAQBAJ', '1638401543', '2147483647', 'MIX（２２）', 'あだち充', '小学館', '2024-05-10', 'http://books.google.com/books/content?id=YqUEEQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '※本タイトルの作品紹介文は、現在作成中でございます。 作成出来ましたら反映致しますので、今しばらくお待ちください。', 'https://play.google.com/store/books/details?id=YqUEEQAAQBAJ&rdid=book-YqUEEQAAQBAJ&rdot=1&source=gbs_api', '2024-06-14 16:56:15'),
(50, 8, '0av1EAAAQBAJ', '0', '0', '推しに甘噛み　4巻', '鈴木ジュリエッタ', '白泉社', '2024-03-19', 'http://books.google.com/books/content?id=0av1EAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'ウブすぎる２人の、もだキュン超加速!!謎の女の子が甘夏くんにデートを要求してきて、モヤモヤするヒナちゃん。一方、ヒナちゃんもハロウィンイベントで桃井に猛アプローチされて、甘夏くんの嫉妬が爆発!?純度100％オタク吸血鬼×ちょっぴり毒舌イケメンの、ブラッディ・ラブコメディ！', 'https://play.google.com/store/books/details?id=0av1EAAAQBAJ&rdid=book-0av1EAAAQBAJ&rdot=1&source=gbs_api', '2024-06-14 16:58:25'),
(51, 8, 'auh9DwAAQBAJ', '2147483647', '2147483647', '神様はじめました　17巻', '鈴木ジュリエッタ', '白泉社', '2014-01-20', 'http://books.google.com/books/content?id=auh9DwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '最後の時廻りへと旅立った奈々生は“全てが終わった”時代で再び黒麿と出会う。そこで巴衛と雪路が辿った運命を見せてもらい…!? 巴衛と奈々生、二人の縁が巡り合う感動の過去編クライマックス！', 'https://play.google.com/store/books/details?id=auh9DwAAQBAJ&rdid=book-auh9DwAAQBAJ&rdot=1&source=gbs_api', '2024-06-14 18:50:35'),
(52, 8, 'Yux9DwAAQBAJ', '2147483647', '2147483647', 'スキップ・ビート！　30巻', '仲村佳樹', '白泉社', '2012年3月19日', 'http://books.google.com/books/content?id=Yux9DwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'B・J役、カイン・ヒールとしての蓮の撮影がスタート。キョーコも妹・雪花となり傍で見守る。だが、カインになりきる蓮の態度が元ヤンの主演・村雨の怒りを買う。アクションシーンで打ち合わせを無視した動きを見せる村雨！ その瞬間から蓮の様子が…！？', 'https://play.google.com/store/books/details?id=Yux9DwAAQBAJ&rdid=book-Yux9DwAAQBAJ&rdot=1&source=gbs_api', '2024-06-14 19:37:11'),
(53, 8, 'd045EAAAQBAJ', '4798168491', '9784798168494', '独習PHP 第4版', '山田 祥寛', '翔泳社', '2021年6月14日', 'http://books.google.com/books/content?id=d045EAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '5年ぶりのメジャーバージョンアップに合わせて大幅改訂！ PHP8の基本構文から、クラス、DB連携、セキュリティ対策まで、しっかり習得。 PHPプログラミングの標準教科書『独習PHP』が、最新のPHP8に対応。 PHPでWebページ／アプリケーションを開発する際に必要な基礎的な知識、 PHPの基本構文から、クラス、データベース連携、セキュリティまで、 詳細かつ丁寧に解説します。 解説→例題→練習問題（理解度チェック）という3つのステップで、 PHPによるWebアプリ開発の基礎・基本テクニックをしっかり習得できます。 実際にサンプルコードを入力し、動作を確かめながら学習することで、 いっそう理解が深まります。 「PHPを一から学びたい・しっかり基礎固めをしたい」 「PHPでWebアプリを作りたい」という方におすすめの1冊です。', '', '2024-06-15 18:13:39'),
(54, 8, 'taY9EAAAQBAJ', '', '', '暁のヨナ　36巻', '草凪みずほ', '白泉社', '2021年8月19日', 'http://books.google.com/books/content?id=taY9EAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '牢を抜け出したメイニャンはハクと出会うが、共に脱獄しようという誘いを断られる。一人で脱獄する中、負傷の為気を失った彼女はユンに保護される。一方、南戒ではメイニャンは帰国したはずとなっており――!?幼き日のスウォンが風の部族領を訪れた番外編も収録！', 'https://play.google.com/store/books/details?id=taY9EAAAQBAJ&rdid=book-taY9EAAAQBAJ&rdot=1&source=gbs_api', '2024-06-17 17:09:10');
>>>>>>> 3da83af (PHP選手権用提出)

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` int(255) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
=======
-- テーブルの構造 `prof_table`
--

CREATE TABLE `prof_table` (
  `pid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `lid` int(12) NOT NULL,
  `nickname` varchar(525) DEFAULT NULL,
  `prof_img` text DEFAULT NULL,
  `prof_text` text DEFAULT NULL,
  `prof_gender` int(2) DEFAULT NULL,
  `gender_pub` int(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `birthday_pub` int(1) DEFAULT NULL,
  `web` varchar(525) DEFAULT NULL,
  `prefecture` int(2) DEFAULT NULL,
  `fab_janle` text DEFAULT NULL,
  `fab_auth` text DEFAULT NULL,
  `best_3` varchar(255) DEFAULT NULL COMMENT 'カンマ区切りで3作品のgidかなにかを保存したい',
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `prof_table`
--

INSERT INTO `prof_table` (`pid`, `uid`, `lid`, `nickname`, `prof_img`, `prof_text`, `prof_gender`, `gender_pub`, `birthday`, `birthday_pub`, `web`, `prefecture`, `fab_janle`, `fab_auth`, `best_3`, `indate`) VALUES
(1, 8, 0, 'がじゅがじゅ', 'upload/202406170715490af6f838dcd762f1551ccb5f09bf826c.jpg', '自己紹介自己紹介自己紹介自己紹介', 2, 0, '2024-06-19', 0, 'WEBサイトWEBサイトWEBサイト', 13, '好きなジャンル 好きなジャンル 好きなジャンル', '好きな作家 好きな作家 好きな作家', NULL, '2024-06-17 14:49:05'),
(11, 0, 0, 'がじゅがじゅ', '', '', 1, 0, '0000-00-00', 0, 'WEBサイトWEBサイトWEBサイトWEBサイトWEBサイトWEBサイトWEBサイトWEBサイトWEBサイト', 0, '', '', NULL, '2024-06-16 04:10:21');

-- --------------------------------------------------------

--
>>>>>>> 3da83af (PHP選手権用提出)
-- テーブルの構造 `review_comment`
--

CREATE TABLE `review_comment` (
  `rcid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `bid` int(12) NOT NULL,
  `rid` int(12) NOT NULL,
  `comment` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `review_table`
--

CREATE TABLE `review_table` (
  `rid` int(12) NOT NULL,
<<<<<<< HEAD
  `uid` int(12) NOT NULL,
  `review` text NOT NULL,
  `publication` int(1) NOT NULL,
  `rate` int(1) NOT NULL,
  `netabare` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

=======
  `gid` varchar(128) NOT NULL,
  `uid` int(12) NOT NULL,
  `bid` int(12) NOT NULL,
  `cid` int(12) NOT NULL,
  `tag` text NOT NULL,
  `status` int(1) NOT NULL,
  `review` text NOT NULL,
  `publication` int(1) NOT NULL,
  `rate` int(1) NOT NULL,
  `netabare` int(1) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `review_table`
--

INSERT INTO `review_table` (`rid`, `gid`, `uid`, `bid`, `cid`, `tag`, `status`, `review`, `publication`, `rate`, `netabare`, `indate`) VALUES
(36, '0', 8, 47, 0, '                                        鈴木ジュリエッタ', 2, 'ジュリエッタ先生の作品\r\nまだ読んでいない', 0, 3, 0, '2024-06-15 14:43:51'),
(37, '0', 8, 49, 6, '                                                            あだち充', 2, '1年に1冊ペースなのですごくゆっくりしている。30年後の明青学園が舞台ということで、タッチ読んでた人にはエモい展開となっている。', 1, 5, 0, '2024-06-15 14:44:00'),
(48, '0', 8, 52, 1, '                    ', 1, 'いい感じの表紙だがこの2人は付き合ってすらいない', 1, 4, 0, '2024-06-15 03:49:03'),
(49, '0', 8, 46, 5, '                                                                                                    ', 4, '神漫画でありました', 0, 5, 0, '2024-06-15 14:43:19'),
(59, '0', 8, 45, 5, '                    ', 1, 'LaLa本誌で絶賛連載中。', 0, 2, 0, '2024-06-15 14:47:35'),
(60, '0', 8, 53, 7, '                                        ', 3, 'ちゃんとする予定です。', 0, 1, 0, '2024-06-15 18:17:27'),
(64, '0', 8, 48, 5, '                                                                                                    ', 1, '言わずとしれた別冊編', 0, 4, 1, '2024-06-17 17:37:21'),
(69, '0', 8, 51, 0, '                    ', 0, '', 0, 0, 1, '2024-06-17 17:37:37');

>>>>>>> 3da83af (PHP選手権用提出)
-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
<<<<<<< HEAD
=======
  `img` text DEFAULT 'img/icon02.png',
>>>>>>> 3da83af (PHP選手権用提出)
  `email` varchar(225) NOT NULL,
  `lid` varchar(255) NOT NULL,
  `lpw` varchar(525) NOT NULL,
  `token` varchar(255) NOT NULL,
  `indate` datetime NOT NULL,
  `member_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

<<<<<<< HEAD
INSERT INTO `user_table` (`id`, `name`, `email`, `lid`, `lpw`, `token`, `indate`, `member_flg`) VALUES
(8, '安藤佳子', 'gajumaro.no.ki@gmail.com', 'test2', '$2y$10$yQo7UfSCL1siX4NAzR9UyukIFqvKt0K31i2fG0k81nb6bTitbl4eW', '', '2024-06-09 14:40:35', 0);
=======
INSERT INTO `user_table` (`id`, `name`, `img`, `email`, `lid`, `lpw`, `token`, `indate`, `member_flg`) VALUES
(8, '安藤佳子', '', 'gajumaro.no.ki@gmail.com', 'test2', '$2y$10$yQo7UfSCL1siX4NAzR9UyukIFqvKt0K31i2fG0k81nb6bTitbl4eW', '', '2024-06-09 14:40:35', 0);
>>>>>>> 3da83af (PHP選手権用提出)

--
-- ダンプしたテーブルのインデックス
--

--
<<<<<<< HEAD
-- テーブルのインデックス `bookcase_table`
--
ALTER TABLE `bookcase_table`
  ADD PRIMARY KEY (`fid`);

--
-- テーブルのインデックス `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`cid`);

--
-- テーブルのインデックス `book_detail`
--
ALTER TABLE `book_detail`
  ADD PRIMARY KEY (`did`);
=======
-- テーブルのインデックス `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `uid` (`uid`);
>>>>>>> 3da83af (PHP選手権用提出)

--
-- テーブルのインデックス `book_table`
--
ALTER TABLE `book_table`
<<<<<<< HEAD
  ADD PRIMARY KEY (`bid`);
=======
  ADD PRIMARY KEY (`bid`),
  ADD KEY `book_table_ibfk_1` (`uid`);
>>>>>>> 3da83af (PHP選手権用提出)

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
<<<<<<< HEAD
=======
-- テーブルのインデックス `prof_table`
--
ALTER TABLE `prof_table`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- テーブルのインデックス `review_comment`
--
ALTER TABLE `review_comment`
  ADD PRIMARY KEY (`rcid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `review_comment_ibfk_2` (`bid`),
  ADD KEY `review_comment_ibfk_3` (`rid`);

--
-- テーブルのインデックス `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`rid`),
  ADD UNIQUE KEY `uid` (`uid`,`bid`),
  ADD KEY `bid` (`bid`),
  ADD KEY `cid` (`cid`) USING BTREE;

--
>>>>>>> 3da83af (PHP選手権用提出)
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
<<<<<<< HEAD
-- テーブルの AUTO_INCREMENT `bookcase_table`
--
ALTER TABLE `bookcase_table`
  MODIFY `fid` int(12) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `book_category`
--
ALTER TABLE `book_category`
  MODIFY `cid` int(12) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `book_detail`
--
ALTER TABLE `book_detail`
  MODIFY `did` int(12) NOT NULL AUTO_INCREMENT;
=======
-- テーブルの AUTO_INCREMENT `book_category`
--
ALTER TABLE `book_category`
  MODIFY `cid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
>>>>>>> 3da83af (PHP選手権用提出)

--
-- テーブルの AUTO_INCREMENT `book_table`
--
ALTER TABLE `book_table`
<<<<<<< HEAD
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
=======
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- テーブルの AUTO_INCREMENT `prof_table`
--
ALTER TABLE `prof_table`
  MODIFY `pid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- テーブルの AUTO_INCREMENT `review_table`
--
ALTER TABLE `review_table`
  MODIFY `rid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
>>>>>>> 3da83af (PHP選手権用提出)

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
<<<<<<< HEAD
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
=======
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `book_category`
--
ALTER TABLE `book_category`
  ADD CONSTRAINT `book_category_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user_table` (`id`);

--
-- テーブルの制約 `book_table`
--
ALTER TABLE `book_table`
  ADD CONSTRAINT `book_table_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_table` (`id`) ON UPDATE CASCADE;

--
-- テーブルの制約 `review_comment`
--
ALTER TABLE `review_comment`
  ADD CONSTRAINT `review_comment_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `book_table` (`bid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `review_comment_ibfk_3` FOREIGN KEY (`rid`) REFERENCES `review_table` (`rid`) ON UPDATE CASCADE;
>>>>>>> 3da83af (PHP選手権用提出)
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
