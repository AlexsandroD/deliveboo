<template>
  <div class="col overflow-hidden">
    <div v-scrollanimation class="card--tomato">
      <div class="top_image--image-1"></div>
      <div class="text">
        <h2>Rider</h2>
        <p>
          Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi
          per te.
        </p>
      </div>
      <a class="btn" href="">Unisciti a noi</a>
    </div>

    <div v-scrollanimation2 class="card--orange">
      <div class="top_image--image-2"></div>
      <div class="text">
        <h2>Ristoranti</h2>
        <p>
          Diventa partner di Deliveroo e raggiungi sempre più clienti. Ci
          occupiamo noi della consegna, così che la tua unica preoccupazione sia
          continuare a preparare il miglior cibo.
        </p>
      </div>
      <a class="btn" href="">Diventa nostro partner</a>
    </div>

    <div v-scrollanimation3 class="card--grey">
      <div class="top_image--image-3"></div>
      <div class="text">
        <h2>Lavora con noi</h2>
        <p>
          La nostra missione è trasformare il modo in cui le persone mangiano. È
          un obiettivo ambizioso, come noi, e ci servono persone che ci aiutino
          a raggiungerlo.
        </p>
      </div>
      <a class="btn" href="">Scopri di piú</a>
    </div>
  </div>
</template>

<script>
export default {
  name: "Card",
};
</script>

<style lang="scss" scoped>
@import "../../assets/style/global.scss";

.col {
  display: grid;
  grid: auto-flow / 1fr;
  row-gap: 20px;

  .card {
    overflow: hidden;
    display: flex;
    flex-direction: column;
    &--tomato {
      @extend .card;
      background-color: $_tomato;
    }
    &--orange {
      @extend .card;
      background-color: $_orange;
    }
    &--grey {
      @extend .card;
      background-color: $_grey;
    }
    .top_image {
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 280px;
      -webkit-clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);
      clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);
      &--image-1 {
        @extend .top_image;
        background-image: url("../../assets/images/work_with_us/riders.90e61988.jpg");
      }
      &--image-2 {
        @extend .top_image;
        background-image: url("../../assets/images/work_with_us/restaurants.3db91a35.jpg");
      }
      &--image-3 {
        @extend .top_image;
        background-image: url("../../assets/images/work_with_us/team.d18fbb67.jpg");
      }
    }

    .text {
      display: flex;
      flex-direction: column;
      justify-content: center;
      color: $_white;
      padding: 20px;

      h2 {
        font-size: 2rem;
        font-weight: bold;
        margin: 10px 0px;
      }
      p {
        margin: 10px 0px;
        font-size: 1rem;
      }
    }

    .btn {
      align-self: start;
      text-align: center;
      width: 200px;
      border-radius: 5px;
      background-color: $_primary;
      color: $_white;
      padding: 10px 5px;
      margin: 15px 15px;
      &:hover {
        background-color: $_darkerPrimaryHover;
      }
    }
  }
}

.before-enter {
  opacity: 0;
  transform: translateX(-80%);
  transition: all 1s ease-in-out;
}

.enter {
  opacity: 1;
  transform: translateX(0);
}

.before-enter-2 {
  opacity: 0;
  transform: translateX(100%);
  transition: all 1s ease-in-out;
}

.enter-2 {
  opacity: 1;
  transform: translateY(0px);
}

.before-enter-3 {
  opacity: 0;
  transform: translateX(-80%);
  transition: all 1s ease-in-out;
}

.enter-3 {
  opacity: 1;
  transform: translateX(0px);
}

@media screen and (min-width: 720px) {
  .col {
    display: grid;
    grid: auto-flow / 1fr 1fr 1fr;
    column-gap: 20px;
  }
}

@media screen and (min-width: 768px) {
  .before-enter {
    opacity: 0;
    transform: translateX(-80%);
    transition: all 1s ease-in-out;
  }

  .enter {
    opacity: 1;
    transform: translateX(0);
  }

  .before-enter-2 {
    opacity: 0;
    transform: translateY(-250px);
    transition: all 1s ease-in-out;
  }

  .enter-2 {
    opacity: 1;
    transform: translateY(0px);
  }

  .before-enter-3 {
    opacity: 0;
    transform: translateX(100%);
    transition: all 1s ease-in-out;
  }

  .enter-3 {
    opacity: 1;
    transform: translateX(0px);
  }
}
</style>