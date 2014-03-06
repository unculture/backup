An example IAM policy for your backup user. 

Bucket and must be pre generated.

Fill out the fields in config.yaml and set up a cron job

{
  "Version": "2012-10-17",
  "Statement": [
    {
      "Sid": "Stmt1394123065000",
      "Effect": "Allow",
      "Action": [
        "s3:ListBucket",
        "s3:PutObject"
      ],
      "Resource": [
        "arn:aws:s3:::bucketname/*"
      ]
    },
    {
      "Sid": "Stmt1394123242000",
      "Effect": "Allow",
      "Action": [
        "s3:ListBucket",
        "s3:PutObject"
      ],
      "Resource": [
        "arn:aws:s3:::bucketname"
      ]
    }
  ]
}
