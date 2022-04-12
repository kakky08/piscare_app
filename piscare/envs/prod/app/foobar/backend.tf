terraform {
    backend "s3" {
        bucket = "piscareappkakk-tfstate"
        key = "piscare/envs/prod/app/foobar_v1.0.0.tfstate"
        region = "ap-northeast-1"
    }
}
