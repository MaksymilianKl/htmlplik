<?php include 'includes/header.php'; ?>
<div style="display:flex;justify-content:center;align-items:center;min-height:60vh;">
  <div style="max-width:500px;width:100%;background:#fff2;padding:30px;border-radius:10px;">
    <h2>Koszyk - 1 produkt</h2>
    <div style="display:flex;align-items:center;justify-content:space-between;">
      <span>Elden Ring</span>
      <span style="font-weight:bold;">$30.99</span>
    </div>
    <form class="cart-form">
      <label>Kod Promocyjny</label>
      <input type="text" name="promo">
      <label>Ilość</label>
      <select name="qty">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
      <button type="submit">Dodaj do koszyka</button>
    </form>
  </div>
</div>
<?php include 'includes/footer.php'; ?> 