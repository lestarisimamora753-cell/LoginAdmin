<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <style>
        body{font-family:Arial; padding:20px}
        table{border-collapse:collapse; width:100%}
        th,td{border:1px solid #ccc; padding:8px}
        th{background:#eee}
    </style>
</head>
<body>
<div style="text-align:right">
 <a href="/logout">Logout</a> | <a href="/logout.php">Logout</a>
</div>
<h2>Data Produk</h2>
<a href="/add">+ Tambah Produk</a>
<br><br>
<table>
    <tr><th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
    <?php foreach($products as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['name']) ?></td>
        <td><?= number_format($p['price']) ?></td>
        <td><?= $p['stock'] ?></td>
        <td>
            <a href="/edit?id=<?= $p['id'] ?>">Edit</a>
            <a href="/delete?id=<?= $p['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>