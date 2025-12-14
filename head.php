  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yusran Bakery</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            cream: '#fff8ef',
            brown: '#7b4f2b',
            brownDark: '#5e3b1e',
          }
        }
      }
    }
  </script>

  <style>
    .produk-card {
      position: relative;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .produk-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    .overlay {
      position: absolute;
      inset: 0;
      background: rgba(91, 60, 34, 0.6);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    .produk-card:hover .overlay {
      opacity: 1;
    }
    .overlay button {
      background-color: #7b4f2b;
      color: #fff8ef;
      border: none;
      padding: 10px 18px;
      margin: 6px;
      border-radius: 10px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }
    .overlay button:hover {
      background-color: #5e3b1e;
    }
  </style>