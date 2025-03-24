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


# gitのざっくりとした使い方
## 開発を始めるときにすること
**新機能の開発を始める時は番号順で構いません。**  
**今作成中の機能の開発を行うときはその他のfetchもしくは７番はのみを実行し最新の状態にしてから開発をしてください。**
### **1. リポジトリのクローン**
まず、リモートリポジトリをローカルにコピーします。

```sh
git clone https://github.com/your-org/your-repo.git
cd your-repo
```

---

### **2. 作業ブランチを作成**
開発を始める前に、新しいブランチを作成します。

```sh
git checkout -b feature/add-login
```

**❗️注意:ブランチ名は自分で決めてください。**

💡 **ポイント**  
- `feature/〇〇` → 新機能追加  
- `fix/〇〇` → バグ修正  
- `hotfix/〇〇` → 緊急修正  

---
### **3. 変更をコミット**
ファイルを編集・作成したら、変更をGitに登録します。

```sh
git add .
git commit -m "ログイン機能を追加"
```

💡 **ポイント**  
- コミットメッセージは簡潔に「何をしたか」が分かるようにする。  
  例: `"Fix: ログイン画面のレイアウト崩れ修正"`  

---

### **4. リモートリポジトリにプッシュ**
変更をリモートリポジトリにアップロードします。

```sh
git push origin feature/add-login
```

---

### **5. プルリクエスト（PR）を作成**
GitHub上で `main` などのメインブランチにマージするための**プルリクエスト**を作成します。  
1. GitHubのリポジトリにアクセス  
2. `Pull Requests` タブを開く  
3. `New Pull Request` をクリック  
4. **「base: main」「compare: feature/add-login」** を選択  
5. 必要ならコメントを追加し、`Create pull request`  

---

### **6. レビュー & 修正**
他のメンバーがプルリクエストをレビューし、問題があれば修正します。  
修正したら再度コミット & プッシュすれば、自動でPRに反映されます。

```sh
git add .
git commit -m "修正: バグ修正"
git push origin feature/add-login
```

---

### **7. 最新の変更をローカルに反映**
他の人の変更を取得するために、定期的に `pull` します。

```sh
git checkout main
git pull origin main
```

---

# **その他の便利な操作**

#### ✅ **変更を取り消したい**
```sh
git checkout -- ファイル名   # 変更を取り消す
git reset --hard HEAD        # すべての変更を取り消す
```

### ✅ **リモートの最新状態を取得**
```sh
git fetch origin
```

### ✅ **強制的にリモートと同期**
```sh
git reset --hard origin/main
```

---

# **おすすめのワークフロー**
1. **`main` ブランチは直接編集せず、必ずブランチを切って作業する**
2. **こまめに `git pull` して最新状態を保つ**
3. **PRのレビューを徹底する（レビューなしでマージしない）**
4. **コンフリクトが発生したら `git merge` or `git rebase` で解決する**

---


