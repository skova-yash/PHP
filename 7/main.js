// 問1:isEven関数を実行して、以下の配列から偶数だけが出力されるように実装してください。

let numbers = [2, 5, 12, 13, 15, 18, 22];
//ここに答えを実装してください。↓↓↓
let num;
for (let i = 0; i < numbers.length; i++) {
	if (numbers[i] % 2 === 0) {
		num = numbers[i];
		isEven();
	}
}

function isEven() {
    console.log(num + 'は偶数です');
}


/* 問2:以下の要件を満たすように実装してください。

【要件】

・インスタンス化した時にガソリンとナンバーがセットされるようなCarクラスを作成する

・「ガソリンは〇〇です。ナンバーは△△です」と出力される「getNumGas」という関数を作成する
*/


class Car{

	constructor(gass, num) {
		this.gass = gass;
		this.num = num;
	}

	getNumGas(){
		console.log(`ガソリンは${this.gass}です。ナンバーは${this.num}です`);
	}
}

let carobj = new Car(40.3, 2345);
carobj.getNumGas();

