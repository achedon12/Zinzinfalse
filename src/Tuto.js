class Tuto extends Phaser.Scene{
    
    constructor(){
        super("Tuto");
    }
    preload() {
        this.load.image('perso', 'assets/sprites/cercle.png');
        this.load.image('background', 'assets/sprites/background.png');
        this.load.image('ground', 'assets/sprites/sol.png');
        this.load.image('door', 'assets/sprites/doortemplate.png');
    }

    create() {
        let me = this;


        if (localStorage.getItem('Tuto') == "true"){
            this.scene.start("Tableau1");
        }
        
        this.cameras.main.setBounds(0, 0, 99999999999999999999999999, 540);
        
        this.background = this.add.image(0, 0, 'background').setOrigin(0,0);

        this.tailleecran = 800;

        

        this.ground = this.physics.add.sprite(0, this.tailleecran, 'ground');
        this.ground.setDisplaySize(99999999999999999999999999999999999999999,5);
        this.ground.body.setAllowGravity(true);
        this.ground.setVisible(true);
        this.ground.setCollideWorldBounds(true);

        this.murgauche = this.physics.add.sprite(0, 0, 'ground');
        this.murgauche.setDisplaySize(0.05,500);
        this.murgauche.body.setAllowGravity(true);
        this.murgauche.setVisible(false);
        this.murgauche.setCollideWorldBounds(true);


        this.porte2 = this.physics.add.sprite(750, 600, 'door');
        this.porte2.setDisplaySize(40,60);
        this.porte2.body.setAllowGravity(true);
        this.porte2.setVisible(true);
        this.porte2.setCollideWorldBounds(true);






        this.perso = this.physics.add.sprite(250, 550, 'perso');
        this.perso.setDisplaySize(30,30);
        this.perso.body.setAllowGravity(true);
        this.perso.setVisible(true);

        this.physics.add.collider(this.ground, this.murgauche);
        this.physics.add.collider(this.murgauche, this.perso);
        this.physics.add.collider(this.ground, this.perso);

        this.initKeyboard();
    }

    initKeyboard(){
        let me = this;
        this.input.keyboard.on('keyup', function (kevent) {
            switch (kevent.keyCode) {
                case Phaser.Input.Keyboard.KeyCodes.LEFT:
                    me.perso.setVelocityX(0)
                    break;
                case Phaser.Input.Keyboard.KeyCodes.RIGHT:
                    me.perso.setVelocityX(0)
                    break;
                case Phaser.Input.Keyboard.KeyCodes.SPACE:
                    me.perso.setVelocityY(0)
                    break;
            }
        })
        this.input.keyboard.on('keydown', function (kevent) {
            switch (kevent.keyCode) {
                case Phaser.Input.Keyboard.KeyCodes.LEFT:
                    me.perso.setVelocityX(-700)
                    break;
                case Phaser.Input.Keyboard.KeyCodes.RIGHT:
                    me.perso.setVelocityX(700)
                    break;
                case Phaser.Input.Keyboard.KeyCodes.SPACE:
                        if(me.perso.body.onFloor()){
                            me.perso.setVelocityY(-700);
                        }else{
                            me.cantMove = false;
                        }
                        me.playeronDoor(me.perso);
                        break;
                case Phaser.Input.Keyboard.KeyCodes.UP:
                    me.playeronDoor(me.perso);
                    break;
                    
            }
        })
    }

    update() {
        //this.cameras.main.scrollX+=this.speed; 
        this.cameras.main.startFollow(this.perso, true, 0.05, 0.05);
        
    }
    playeronDoor(player){
        if(this.physics.overlap(player, this.porte2)){
            localStorage.setItem('Tuto', true);
            this.scene.start("Tableau1");
            //this.scene.start("Tableau2");
        }
    }
}