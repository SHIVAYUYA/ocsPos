# ocsPos - 学園祭レジシステム

このリポジトリは、学園祭などのイベント向けに開発されたレジシステム「ocsPos」です。Docker を使って Laravel 開発環境を簡単に構築・共有できます。

---

## 📦 必要な環境

- Docker
- Docker Compose
- Git

---

## 🚀 環境構築手順

### 1. リポジトリをクローン

```bash
git clone https://github.com/SHIVAYUYA/ocsPos.git
cd ocsPos
```

### 2. Docker 環境をビルド＆起動
```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```
### 3. ブラウザでアクセス
http://localhost

## ディレクトリ構成（一部抜粋）
``` 
ocsPos/
├── docker/                    # Docker 関連ファイル
│   ├── Dockerfile             # PHP + Composer イメージ用
│   └── entrypoint.sh          # Laravel 起動スクリプト（マイグレーション・シーディング含む）
├── src/                       # Laravel プロジェクト一式
│   ├── app/                   # アプリケーションロジック
│   ├── bootstrap/             
│   ├── config/                
│   ├── database/              # マイグレーション・シーダー
│   ├── public/                # ドキュメントルート（style.cssなどはここに配置）
│   ├── resources/             # Bladeテンプレート、CSS, JS
│   ├── routes/                # Web/APIルーティング
│   └── ...
├── docker-compose.yml         # コンテナ定義
└── README.md                  # 本ドキュメント
```  

### もしファイルが読み込めない場合
手動で変換（Linux コマンド）：
dos2unix docker/entrypoint.sh
