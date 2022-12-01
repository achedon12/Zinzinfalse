let gameConfig = {
    type: Phaser.AUTO,
    width: 800,
    height: 600,
    backgroundColor: '#000000',
    parent: 'game',
    physics: {
        default: 'arcade',
        arcade: {
            gravity: { y : 1000 },
        }
    },
    scene: new Tableau1()
};
let game = new Phaser.Game(gameConfig);