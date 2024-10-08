<?php

$anime = [
    [
        'nama' => 'Attack on Titan',
        'tanggal_rilis' => '2013',
        'gambar' => 'https://i.pinimg.com/originals/7a/0d/c2/7a0dc24f568b81a39ba1ce797f65d355.jpg',
        'deskripsi' => 'Attack on Titan adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Hajime Isayama.'
    ],
    [
        'nama' => 'My Hero Academia',
        'tanggal_rilis' => '2016',
        'gambar' => 'https://wallpapers.com/images/featured/my-hero-academia-pictures-otjtzn3d4q78f6kx.jpg',
        'deskripsi' => 'My Hero Academia adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Kohei Horikoshi.'
    ],
    [
        'nama' => 'Haikyuu!!',
        'tanggal_rilis' => '2014',
        'gambar' => 'https://media.suara.com/pictures/1600x840/2024/05/31/82455-anime-haikyuu.jpg',
        'deskripsi' => 'Haikyuu!! adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Haruichi Furudate.'
    ],
    [
        'nama' => 'Black Clover',
        'tanggal_rilis' => '2017',
        'gambar' => 'https://awsimages.detik.net.id/community/media/visual/2023/12/27/black-clover.png?w=1200',
        'deskripsi' => 'Black Clover adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Yki Tabata.'
    ],
    [
        'nama' => 'Demon Slayer: Kimetsu no Yaiba',
        'tanggal_rilis' => '2019',
        'gambar' => 'https://newronanima.com/wp-content/uploads/2023/06/fakta-menarik-kimetsu-no-yaiba-demon-slayer.jpeg',
        'deskripsi' => 'Demon Slayer: Kimetsu no Yaiba adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Koyoharu Gotoge.'
    ],
    [
        'nama' => 'Death Note',
        'tanggal_rilis' => '2006',
        'gambar' => 'https://i.ytimg.com/vi/hllsOtU1CEA/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCcLUOrnis-WejCviUu6sh4I8taHA',
        'deskripsi' => 'Death Note adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Tsugumi Ohba dan Takeshi Obata.'
    ],
    [
        'nama' => 'Naruto',
        'tanggal_rilis' => '2002',
        'gambar' => 'https://img.antaranews.com/cache/1200x800/2012/12/2012120220120625naruto.jpg',
        'deskripsi' => 'Naruto adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Masashi Kishimoto.'
    ],
    [
        'nama' => 'One Piece',
        'tanggal_rilis' => '1999',
        'gambar' => 'https://images.tokopedia.net/img/KRMmCm/2023/9/18/9f609a7c-bcb1-488e-938c-6df8576dea06.jpg',
        'deskripsi' => 'One Piece adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Eiichiro Oda.'
    ],
    [
        'nama' => 'Bleach',
        'tanggal_rilis' => '2004',
        'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8mEKE4kwTJbJw7UHcNUtfMyyY3uH-d5rPtg&s',
        'deskripsi' => 'Bleach adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Tite Kubo.'
    ],
    [
        'nama' => 'Fullmetal Alchemist: Brotherhood',
        'tanggal_rilis' => '2009',
        'gambar' => 'https://www.greenscene.co.id/wp-content/uploads/2021/04/Fullmetal.jpg',
        'deskripsi' => 'Fullmetal Alchemist: Brotherhood adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Hiromu Arakawa.'
    ]
];


function sudahBerapaTahun($tahun)
{
    return date('Y') - $tahun;
}
