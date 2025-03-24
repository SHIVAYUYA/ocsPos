# ocsPos リポジトリのセットアップ
初めに、このリポジトリに参加するための手順を説明します。

## 1. リポジトリをクローンする
以下のコマンドを実行して、ローカル環境にリポジトリをクローンしてください。

```sh
git clone https://github.com/あなたのユーザー名/ocsPos.git
cd ocsPos
```

## 2. ブランチを作成する
新しい機能や修正を加える場合は、新しいブランチを作成してください。

```sh
git checkout -b feature/ブランチ名
```

## 3. 変更を加えてコミットする
ファイルを編集後、以下のコマンドで変更をコミットしてください。

```sh
git add .
git commit -m "変更内容の説明"
```

## 4. リモートリポジトリにプッシュする
作成したブランチをリモートリポジトリにプッシュします。

```sh
git push origin feature/ブランチ名
```

## 5. Pull Request (PR) を作成する
GitHub上で `feature/ブランチ名` から `main` へのPull Requestを作成してください。

1. GitHubのリポジトリページにアクセス
2. `Pull Requests` タブを開く
3. `New Pull Request` ボタンをクリック
4. `base: main` と `compare: feature/ブランチ名` を選択
5. `Create Pull Request` ボタンを押してPRを作成

## 6. レビュー & マージ
リポジトリ管理者がPRをレビューし、問題がなければ `main` にマージします。

---

### **注意事項**
- `main` ブランチに直接コミット・プッシュしないでください。
- 作業ごとに適切なブランチを作成し、Pull Request を経由してマージしてください。
- コードレビューを受けて、必要な修正を行ってください。
- `git pull origin main` で最新の `main` を取り込むようにしてください。

これで、ocsPos での開発に参加できます！ 

---

# **開発のワークフロー**
1. **git clone**
2. **git pull**
3. **git checkout -b feature/〇〇**
4. **commit & push**
5.**プルリクエスト作成**
   
---

# **ワークフローに関して**
1. **`main` ブランチは直接編集せず、必ずブランチを切って作業する**
2. **こまめに `git pull` して最新状態を保つ**
3. **PRのレビューを徹底する（レビューなしでマージしない）**
4. **コンフリクトが発生したら `git merge` or `git rebase` で解決する**
