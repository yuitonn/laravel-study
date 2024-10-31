<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bladeテンプレートでフォームを作成する</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-8">フォームを使ったデータ送信</h1>

        <section>
            <h2 class="text-2xl font-bold mb-4">1. フォームの基本構造</h2>
            <p class="mb-4">
                Bladeでは、通常のHTMLと同じように form タグを使ってフォームを作成します。以下は基本的なフォームの例です。
            </p>
            <div class="bg-gray-100 p-4 rounded mb-6">
                <div>
                {{-- フォームの基本例 --}}
                <form action="{{ route('yuito.store') }}" method="POST">
                    <!-- yuito.storeって名前のルートを使うよ -->
                    @csrf 
                    {{-- CSRF保護のために必ず入れる --}}
                    <label for="name">アイテム名:</label>
                    <input type="text" id="name" name="name" class="border p-2 mb-4">
                    
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">保存</button>
                </form>
                </div>
                <!-- actionの中に、フォームが送信された時にどこにデータを送るか指定するよ -->
                <!-- method="POST"でデータを安全に送信するよ -->
                <!-- @csrfはLaravelのセキュリティ機能。必ずフォームの中に入れよう -->
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-4">2. フォームのバリデーション</h2>
            <p class="mb-4">
                フォーム送信時には、バリデーションを使って入力内容をチェックします。例えば、`name` が必須入力であるかをチェックします。
            </p>
            <pre class="bg-gray-100 p-4 rounded mb-6">
                これはここじゃなくてコントローラーに書く内容だよ
                <code>
                {{-- コントローラー側でバリデーションを実行 --}}
                public function store(Request $request) {
                    $request->validate([
                        'name' => 'required|max:255',
                    ]);

                    // バリデーションに成功したら処理を続行してデータベースに保存
                    $item = new Item();
                    $item->name = $request->input('name');
                    $item->save();

                    return redirect()->route('items.create')->with('success', 'アイテムが保存されました！');
                }
                </code>
                <!-- validate()関数でフォームの内容が正しいかどうか確認できるよ -->
                <!-- nameが空だったらエラーメッセージを表示する -->
            </pre>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-4">3. エラーメッセージの表示</h2>
            <p class="mb-4">
                バリデーションでエラーが発生した場合、Bladeテンプレート内でエラーメッセージを表示できます。
            </p>
            <pre class="bg-gray-100 p-4 rounded mb-6">
                <code>
                {{-- エラーメッセージの表示 --}}
                @if ($errors->any())
                    <div class="bg-red-100 p-4 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </code>
                <!-- $errorsは、バリデーションで引っかかったエラーを表示するためのもの -->
                <!-- リスト形式でエラーを表示できるよ -->
            </pre>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-4">4. 成功メッセージの表示</h2>
            <p class="mb-4">
                フォームが正しく送信され、処理が成功した場合、成功メッセージを表示できます。
            </p>
            <pre class="bg-gray-100 p-4 rounded mb-6">
                <code>
                {{-- 成功メッセージの表示 --}}
                @if (session('success'))
                    <div class="bg-green-100 p-4 mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                </code>
                <!-- session('success')を使って、処理が成功したらメッセージを表示する -->
                <!-- コントローラーで session()->flash('success', 'アイテムが保存されました！'); と設定するよ -->
            </pre>
        </section>

    </div>
</body>
</html>