-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-06-12 04:15:36
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
-- テーブルの構造 `book_category`
--

CREATE TABLE `book_category` (
  `cid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `cname` varchar(525) NOT NULL,
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
  `isbn` varchar(125) NOT NULL,
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
  `uid` int(12) NOT NULL,
  `review` text NOT NULL,
  `publication` int(1) NOT NULL,
  `rate` int(1) NOT NULL,
  `netabare` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
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

INSERT INTO `user_table` (`id`, `name`, `email`, `lid`, `lpw`, `token`, `indate`, `member_flg`) VALUES
(8, '安藤佳子', 'gajumaro.no.ki@gmail.com', 'test2', '$2y$10$yQo7UfSCL1siX4NAzR9UyukIFqvKt0K31i2fG0k81nb6bTitbl4eW', '', '2024-06-09 14:40:35', 0);

--
-- ダンプしたテーブルのインデックス
--

--
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

--
-- テーブルのインデックス `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`bid`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
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

--
-- テーブルの AUTO_INCREMENT `book_table`
--
ALTER TABLE `book_table`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
